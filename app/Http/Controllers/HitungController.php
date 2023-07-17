<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\nilaiAnggota;
use App\Models\kerjaTim;
use App\Models\komunikasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HitungController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->admin == 1) {
            $user = User::where('admin', '0')->get();
            $user2 = User::where('admin', '0')->get();
            $kerjaTim = kerjaTim::all();
            $komunikasi = komunikasi::all();
            $nilaiAnggota = nilaiAnggota::all();
            return view('profMatc.hitung', compact('user', 'user2', 'nilaiAnggota', 'kerjaTim', 'komunikasi'));
        } else {
            return view('home');
        }
    }
}

