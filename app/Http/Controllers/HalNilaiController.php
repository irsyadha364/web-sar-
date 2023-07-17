<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\kerjaTim;
use App\Models\komunikasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HalNilaiController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->admin == 1) {
            $user = User::where('admin', '0')->get();
            $kerjaTim = kerjaTim::all();
            $komunikasi = komunikasi::all();
            return view('nilaiKerja.halNilai', compact('user', 'kerjaTim', 'komunikasi'));
        } else {
            return view('home');
        }
    }
}
