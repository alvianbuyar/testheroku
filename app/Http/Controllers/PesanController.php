<?php

namespace App\Http\Controllers;

use App\addproduct;
use App\detail;
use App\purchaselog;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert;

class PesanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $data = addproduct::where('id', $id)->first();
        return view('home.pesan.index', compact('data'));
    }

    public function pesan(Request $request, $id)
    {
        $data = addproduct::where('id', $id)->first();
        $date = Carbon::today();

        //cek validasi totals
        if ($request->total > $data->stock) {
            alert()->error('Maaf stock habis silahkan memesan item yang lain', 'Stock Habis');
            return redirect('pesan/' . $id);
        }

        //cek validasi
        $purchase_check = purchaselog::where('id_users', Auth::user()->id)->where('purchase_status', 0)->first();
        if (empty($purchase_check)) {
            //simpan ke database pesanan
            $purchase = new purchaselog();
            $purchase->code = mt_rand(1000, 9999);
            $purchase->id_users = Auth::user()->id;
            $purchase->purchase_status = 0;
            $purchase->purchase_date = $date;
            $purchase->purchase_total = 0;
            $purchase->proof = 0;
            $purchase->save();
        }

        //simpan ke database pesanan
        $new_purchase = purchaselog::where('id_users', Auth::user()->id)->where('purchase_status', 0)->first();

        //cek pesanan detail
        $check_detail = detail::where('id_purchaselogs', $new_purchase->id)->where('id_addproducts', $data->id)->first();

        if (empty($check_detail)) {
            $detail = new detail();
            $detail->id_purchaselogs = $new_purchase->id;
            $detail->id_addproducts = $data->id;
            $detail->tube_status = 0;
            // $detail->total_product = $request->total;
            $detail->total_product = 1;
            $detail->loan_status = $request->loan;
            if ($request->loan != 1) {
                // $detail->total_detail = ($data->product_price + $data->tube_price) * $request->total;
                $detail->total_detail = ($data->product_price + $data->tube_price) * 1;
            } else {
                // $detail->total_detail = $data->product_price * $request->total;
                $detail->total_detail = $data->product_price * 1;
            }
            $detail->save();

            // $data->trigger = $data->trigger - $request->total;
            $data->trigger = $data->trigger - 1;
            $data->update();
        } else {
            $detail = detail::where('id_purchaselogs', $new_purchase->id)->where('id_addproducts', $data->id)->first();
            // $detail->total_product = $detail->total_product + $request->total;
            $detail->total_product = $detail->total_product + 1;

            //harga sekarang
            if ($request->loan != 1) {
                // $new_price = ($data->product_price + $data->tube_price) * $request->total;
                $new_price = ($data->product_price + $data->tube_price) * 1;
            } else {
                // $new_price = $data->product_price * $request->total;
                $new_price = $data->product_price * 1;
            }
            $detail->total_detail = $detail->total_detail + $new_price;
            $detail->update();
        }

        //jumlah total jika pinjam atau tidak
        if ($request->loan != 1) {
            $purchase = purchaselog::where('id_users', Auth::user()->id)->where('purchase_status', 0)->first();
            // $purchase->purchase_total = $purchase->purchase_total + ($data->product_price + $data->tube_price) * $request->total;
            $purchase->purchase_total = $purchase->purchase_total + ($data->product_price + $data->tube_price) * 1;
            $purchase->update();
        } else {
            $purchase = purchaselog::where('id_users', Auth::user()->id)->where('purchase_status', 0)->first();
            // $purchase->purchase_total = ($purchase->purchase_total + $data->product_price) * $request->total;
            $purchase->purchase_total = ($purchase->purchase_total + $data->product_price) * 1;
            $purchase->update();
        }

        alert()->success('Pesanan dimasukkan keranjang', 'Sukses');
        return redirect('home');
    }

    public function checkout()
    {
        $purchase = purchaselog::where('id_users', Auth::user()->id)->where('purchase_status', 0)->first();
        if (!empty($purchase)) {
            $detail = detail::where('id_purchaselogs', $purchase->id)->get();
            return view('home.pesan.checkout', compact('purchase', 'detail'));
        }
        return view('home.pesan.checkout');
    }

    public function delete($id)
    {
        $detail = detail::where('id', $id)->first();

        $purchase = purchaselog::where('id', $detail->id_purchaselogs)->first();
        $purchase->purchase_total = $purchase->purchase_total - $detail->total_detail;
        $purchase->update();

        $data = addproduct::where('id', $detail->id_addproducts)->first();
        $data->trigger = 1;
        $data->update();

        $detail->delete();

        alert()->success('Pesanan berhasil dihapus', 'Sukses');
        return redirect('checkout');
    }

    public function confirm()
    {
        $user = User::where('id', Auth::user()->id)->first();

        if (empty($user->address)) {
            alert()->warning('Harap lengkapi identitas alamat terlebih dahulu', 'Peringatan');
            return redirect('editprofile');
        }

        if (empty($user->phone_number)) {
            alert()->warning('Harap lengkapi identitas nomor HP terlebih dahulu', 'Peringatan');
            return redirect('editprofile');
        }

        if (empty($user->ktp_image)) {
            alert()->warning('Harap lengkapi identitas terlebih dahulu', 'Peringatan');
            return redirect('editprofile');
        }

        $purchase = purchaselog::where('id_users', Auth::user()->id)->where('purchase_status', 0)->first();
        $detail_id = $purchase->id;
        $purchase->purchase_status = 1;
        $purchase->update();

        $purchase_details = detail::where('id_purchaselogs', $detail_id)->get();
        foreach ($purchase_details as $purchase_detail) {
            $data = addproduct::where('id', $purchase_detail->id_addproducts)->first();
            $data->stock = $data->stock - $purchase_detail->total_product;
            $data->update();
        }

        alert()->success('Anda berhasil melakukan checkout', 'Sukses');
        return redirect('history/' . $detail_id);
    }
}
