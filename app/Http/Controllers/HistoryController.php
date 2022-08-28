<?php

namespace App\Http\Controllers;

use App\User;
use App\detail;
use App\purchaselog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $purchase = purchaselog::where('id_users', Auth::user()->id)->where('purchase_status', '!=', 0)->get();

        return view('home.history.index', compact('purchase'));
    }

    public function detail($id)
    {
        $purchase = purchaselog::where('id', $id)->first();
        $purchase_detail = detail::where('id_purchaselogs', $purchase->id)->get();

        return view('home.history.detail', compact('purchase', 'purchase_detail'));
    }

    public function upload(Request $request, $id)
    {
        $purchase = purchaselog::where('id', $id)->firstOrFail();

        $request->validate([
            'payment_image' => 'mimes:jpeg,png,jpg,svg',
        ]);

        $imgPaymentName = $request->payment_image->getClientOriginalName() . '-' . time()
            . '-' . $request->payment_image->extension();

        $request->payment_image->move(public_path() . '/paymentImage', $imgPaymentName);

        if ($request->payment_image != '') {
            $path = public_path() . '/paymentImage/';

            if ($purchase->payment_image != '' && $purchase->payment_image != null) {
                $file_old = $path . $purchase->payment_image;
                unlink($file_old);
            }
        }

        $purchase->payment_image = $imgPaymentName;
        $purchase->purchase_status = 2;
        $purchase->update();

        alert()->success('Anda berhasil upload foto bukti pembayaran', 'Sukses');
        return redirect('home');
    }
}
