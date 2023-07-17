<?php

namespace App\Http\Controllers;

use App\Models\komunikasi;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class KomunikasiController extends Controller
{
    public function index($idLogin)
    {
        if (Auth::check() && Auth::user()->admin == 1) {
            $user = User::where('id', $idLogin)->first();
            $nilai = komunikasi::all();
            return view('nilaiKerja.komunikasi', compact('user', 'nilai'));
        } else {
            dd(Auth::user()->id );
            return view('home');
        }
    }

    public function store(Request $request, $idLogin)
    {
        $request->validate([
            'soalKom1' => 'required',
            'soalKom2' => 'required',
            'soalKom3' => 'required',
            'soalKom4' => 'required',
            'soalKom5' => 'required',
        ]);

        $count = 0;

        $komunikasi = new komunikasi;
        $komunikasi->idLogin = $idLogin;

        $temp = $request->get('soalKom1');
        if ($temp == 'Baik') {
            $count++;
        }
        $komunikasi->soalKom1 = $temp;

        $temp = $request->get('soalKom2');
        if ($temp == 'Baik') {
            $count++;
        }
        $komunikasi->soalKom2 = $temp;

        $temp = $request->get('soalKom3');
        if ($temp == 'Baik') {
            $count++;
        }
        $komunikasi->soalKom3 = $temp;

        $temp = $request->get('soalKom4');
        if ($temp == 'Baik') {
            $count++;
        }
        $komunikasi->soalKom4 = $temp;

        $temp = $request->get('soalKom5');
        if ($temp == 'Baik') {
            $count++;
        }
        $komunikasi->soalKom5 = $temp;
        $komunikasi->nilaiKom = $count;

        $komunikasi->save();
        return redirect()->route('nilaiKerja.halNilai');
    }

    public function update(Request $request, $idLogin)
    {
        $count = 0;

        $komunikasi = komunikasi::where('idLogin', $idLogin)->first();
        $komunikasi->idLogin = $idLogin;

        $temp = $request->get('soalKom1');
        if ($temp == 'Baik') {
            $count++;
        }
        $komunikasi->soalKom1 = $temp;

        $temp = $request->get('soalKom2');
        if ($temp == 'Baik') {
            $count++;
        }
        $komunikasi->soalKom2 = $temp;

        $temp = $request->get('soalKom3');
        if ($temp == 'Baik') {
            $count++;
        }
        $komunikasi->soalKom3 = $temp;

        $temp = $request->get('soalKom4');
        if ($temp == 'Baik') {
            $count++;
        }
        $komunikasi->soalKom4 = $temp;

        $temp = $request->get('soalKom5');
        if ($temp == 'Baik') {
            $count++;
        }
        $komunikasi->soalKom5 = $temp;
        $komunikasi->nilaiKom = $count;

        $komunikasi->save();
        return redirect()->route('nilaiKerja.halNilai');
    }

    public function kosong()
    {
        return view('home');
    }
}
