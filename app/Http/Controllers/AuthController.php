<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Hash;

class AuthController extends Controller
{
    public function masuk()
    {
    	return view('masuk.masuk');
    }

    public function postMasuk(Request $request)
    {
    	if (Auth::attempt($request->only('username','password'))) {
            if (auth()->user()->role == 'admin') {
        		return redirect()->route('admin.dashboard')->with('selamatdatang','');
            } elseif (auth()->user()->role == 'kasir') {
                return redirect()->route('kasir.dashboard')->with('selamatdatang','');
            } else {
                return redirect()->route('owner.dashboard')->with('selamatdatang','');
            }
    	}

    	return redirect()->back()->with('gagal', '');
    }

    public function keluar()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    // Ganti KS
    public function gantiKs(User $user)
    {
        if (auth()->user()->id == $user->id) {
            return view('masuk.gantiKs', ['jquin' => $user]);
        }

        return redirect()->back();
    }

    public function updatepw(Request $request, User $user)
    {
        // Validasi
        $this->validate($request, [
            'sandiLama' => 'required',
            'sandiBaru' => 'required|min:8'
        ]);

        $sandiLama = $request->sandiLama;
        $sandiBaru = $request->sandiBaru;

            if (!Hash::check($sandiLama, Auth::user()->password)) {
                return redirect()->back()->with('error','');
            }else{
                 $request->user()->fill([
                        'password' => Hash::make($request->sandiBaru)
                    ])->save();

                 if (auth()->user()->role == 'admin') {
                        return redirect()->route('admin.dashboard')->with('suksespw','');
                 } elseif (auth()->user()->role == 'kasir') {
                        return redirect()->route('kasir.dashboard')->with('suksespw','');
                 } elseif (auth()->user()->role == 'owner') {
                        return redirect()->route('owner.dashboard')->with('suksespw','');
                 }

                // return redirect()->route('dashboard.index')->with('suksespw','');
            }
    }
}
