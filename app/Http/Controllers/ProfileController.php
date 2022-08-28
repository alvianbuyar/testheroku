<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use UxWeb\SweetAlert\SweetAlert;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();

        return view('home.profile.index', compact('user'));
    }

    public function edit()
    {
        $user = User::where('id', Auth::user()->id)->first();

        return view('home.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'ktp_image' => 'mimes:jpeg,png,jpg,svg',
        ]);

        $user = User::where('id', Auth::user()->id)->first();
        $user->name = $request->name;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;

        $imgKTPName = $request->ktp_image->getClientOriginalName() . '-' . time()
            . '-' . $request->ktp_image->extension();

        $request->ktp_image->move(public_path() . '/ktpImage', $imgKTPName);

        if ($request->ktp_image != '') {
            $path = public_path() . '/ktpImage/';

            if ($user->ktp_image != '' && $user->ktp_image != null) {
                $file_old = $path . $user->ktp_image;
                unlink($file_old);
            }
        }

        $user->ktp_image = $imgKTPName;
        $user->update();

        alert()->success('Anda berhasil memperbarui profile', 'Sukses');
        return redirect('home');
    }
}
