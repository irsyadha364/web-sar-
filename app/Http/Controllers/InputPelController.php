<?php

namespace App\Http\Controllers;

use App\Models\laporLatih;
use App\Models\nilaiAnggota;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class InputPelController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->admin == 0) {
            return view('inputUser.inputPel');
        } else {
            return view('home');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaKegiatan' => 'required',
            'divPel' => 'required',
            'tanggalKegiatan' => 'required',
            'peran' => 'required',
        ]);
        $check = nilaiAnggota::where('idLogin', Auth::user()->id)->count();

        if ($check < 1) {
            $nilai = new nilaiAnggota;
            $nilai->idLogin = Auth::user()->id;
            $nilai->pengPara = '0';
            $nilai->pengNavi = '0';
            $nilai->pengEvak = '0';
            $nilai->pengPosko = '0';
            $nilai->pelPara = '0';
            $nilai->pelNavi = '0';
            $nilai->pelEvak = '0';
            $nilai->pelPosko = '0';
            $nilai->save();

            $laporLatih = new laporLatih;
            $laporLatih->namaKegiatan = $request->get('namaKegiatan');
            $laporLatih->divPel = $request->get('divPel');
            $laporLatih->tanggalKegiatan = $request->get('tanggalKegiatan');
            $laporLatih->peran = $request->get('peran');
            $laporLatih->idLogin = Auth::user()->id;
            $laporLatih->save();

            $nilai = nilaiAnggota::where('idLogin', $laporLatih->idLogin)->first();
            if ($laporLatih->divPel == "Paramedis") {
                $nilai->pelPara += '1';
            }
            elseif ($laporLatih->divPel == 'Navigasi') {
                $nilai->pelNavi += '1';
            }
            elseif ($laporLatih->divPel == 'Evakuasi') {
                $nilai->pelEvak += '1';
            }
            elseif ($laporLatih->divPel == 'Posko Bencana') {
                $nilai->pelPosko += '1';
            }
            $nilai->update();
        } else {
            $laporLatih = new laporLatih;
            $laporLatih->namaKegiatan = $request->get('namaKegiatan');
            $laporLatih->divPel = $request->get('divPel');
            $laporLatih->tanggalKegiatan = $request->get('tanggalKegiatan');
            $laporLatih->peran = $request->get('peran');
            $laporLatih->idLogin = Auth::user()->id;
            $laporLatih->save();

            $nilai = nilaiAnggota::where('idLogin', $laporLatih->idLogin)->first();
            if ($laporLatih->divPel == "Paramedis") {
                $nilai->pelPara += '1';
                $nilai->update();
            }
            elseif ($laporLatih->divPel == 'Navigasi') {
                $nilai->pelNavi += '1';
                $nilai->update();
            }
            elseif ($laporLatih->divPel == 'Evakuasi') {
                $nilai->pelEvak += '1';
                $nilai->update();
            }
            elseif ($laporLatih->divPel == 'Posko Bencana') {
                $nilai->pelPosko += '1';
                $nilai->update();
            }

        }
        return redirect()->route('inputUser.halPel');
    }
}
