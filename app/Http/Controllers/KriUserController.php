<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\nilaiAnggota;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class KriUserController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->admin == 1) {
            $user = User::where('admin', '0')->get();
            $user2 = User::where('admin', '0')->get();
            $nilaiAnggota = nilaiAnggota::all();
            return view('kriteria.kriUser', compact('user', 'user2', 'nilaiAnggota'));
        } else {
            return view('home');
        }
    }
}
