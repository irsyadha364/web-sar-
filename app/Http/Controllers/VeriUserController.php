<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\nilaiAnggota;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class VeriUserController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->admin == 1) {
            return view('veriUser.veriUser');
        } else {
            return view('home');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $veriUser = new User;
        $veriUser->name = $request->get('name');
        $veriUser->email = $request->get('email');
        $password = $request->get('password');
        $veriUser->password = Hash::make($password);
        $veriUser->save();
        return redirect()->route('veriUser.halVeri');
    }
}
