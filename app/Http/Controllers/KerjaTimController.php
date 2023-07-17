<?php

namespace App\Http\Controllers;

use App\Models\kerjaTim;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class KerjaTimController extends Controller
{
    public function index($idLogin)
    {
        if (Auth::check() && Auth::user()->admin == 1) {
            $user = User::where('id', $idLogin)->first();
            $nilai = kerjaTim::all();
            return view('nilaiKerja.kerjaTim', compact('user', 'nilai'));
        } else {
            return view('home');
        }
    }

    public function store(Request $request, $idLogin)
    {
        $request->validate([
            'soalTim1' => 'required',
            'soalTim2' => 'required',
            'soalTim3' => 'required',
            'soalTim4' => 'required',
            'soalTim5' => 'required',
        ]);

        $count = 0;

        $kerjaTim = new kerjaTim;
        $kerjaTim->idLogin = $idLogin;

        $temp = $request->get('soalTim1');
        if ($temp == 'Baik') {
            $count++;
        }
        $kerjaTim->soalTim1 = $temp;

        $temp = $request->get('soalTim2');
        if ($temp == 'Baik') {
            $count++;
        }
        $kerjaTim->soalTim2 = $temp;

        $temp = $request->get('soalTim3');
        if ($temp == 'Baik') {
            $count++;
        }
        $kerjaTim->soalTim3 = $temp;

        $temp = $request->get('soalTim4');
        if ($temp == 'Baik') {
            $count++;
        }
        $kerjaTim->soalTim4 = $temp;

        $temp = $request->get('soalTim5');
        if ($temp == 'Baik') {
            $count++;
        }
        $kerjaTim->soalTim5 = $temp;
        $kerjaTim->nilaiTim = $count;

        $kerjaTim->save();
        return redirect()->route('nilaiKerja.halNilai');
    }

    public function update(Request $request, $idLogin)
    {
        $count = 0;

        $kerjaTim = kerjaTim::where('idLogin', $idLogin)->first();
        $kerjaTim->idLogin = $idLogin;

        $temp = $request->get('soalTim1');
        if ($temp == 'Baik') {
            $count++;
        }
        $kerjaTim->soalTim1 = $temp;

        $temp = $request->get('soalTim2');
        if ($temp == 'Baik') {
            $count++;
        }
        $kerjaTim->soalTim2 = $temp;

        $temp = $request->get('soalTim3');
        if ($temp == 'Baik') {
            $count++;
        }
        $kerjaTim->soalTim3 = $temp;

        $temp = $request->get('soalTim4');
        if ($temp == 'Baik') {
            $count++;
        }
        $kerjaTim->soalTim4 = $temp;

        $temp = $request->get('soalTim5');
        if ($temp == 'Baik') {
            $count++;
        }
        $kerjaTim->soalTim5 = $temp;
        $kerjaTim->nilaiTim = $count;

        $kerjaTim->save();
        return redirect()->route('nilaiKerja.halNilai');
    }

    public function kosong()
    {
        return view('home');
    }
}
