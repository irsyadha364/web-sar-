<?php

namespace App\Http\Controllers;

use App\Models\laporGiat;

use App\Models\nilaiAnggota;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class InputPengController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->admin == 0) {
            return view('inputUser.inputPeng');
        } else {
            return view('home');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomorKegiatan' => 'required',
            'tanggalKegiatan' => 'required',
            'waktuKeberangkatan' => 'required',
            'jenisKegiatan' => 'required',
            'namaPetugas' => 'required',
            'divPeng' => 'required',
            'unitKendaraan' => 'required',
            'namaPemohon' => 'required',
            'nomorPemohon' => 'required',
            'penjemputan' => 'required',
            'pengantaran' => 'required',
            // 'dokumentasi'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'dataPendukung' => 'required',
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

            $laporGiat = new laporGiat;
            $laporGiat->nomorKegiatan = $request->get('nomorKegiatan');
            $laporGiat->tanggalKegiatan = $request->get('tanggalKegiatan');
            $laporGiat->waktuKeberangkatan = $request->get('waktuKeberangkatan');
            $laporGiat->jenisKegiatan = $request->get('jenisKegiatan');
            $laporGiat->namaPetugas = $request->get('namaPetugas');
            $laporGiat->divPeng = $request->get('divPeng');
            $laporGiat->unitKendaraan = $request->get('unitKendaraan');
            $laporGiat->namaPemohon = $request->get('namaPemohon');
            $laporGiat->nomorPemohon = $request->get('nomorPemohon');
            $laporGiat->penjemputan = $request->get('penjemputan');
            $laporGiat->pengantaran = $request->get('pengantaran');
            // $laporGiat->dokumentasi = $image_name;
            $laporGiat->dataPendukung = $request->get('dataPendukung');
            $laporGiat->idLogin = Auth::user()->id;
            $laporGiat->save();

            $nilai = nilaiAnggota::where('idLogin', $laporGiat->idLogin)->first();
            if ($laporGiat->divPeng == "Paramedis") {
                $nilai->pengPara += '2';
            } elseif ($laporGiat->divPeng == 'Navigasi') {
                $nilai->pengNavi += '2';
            } elseif ($laporGiat->divPeng == 'Evakuasi') {
                $nilai->pengEvak += '2';
            } elseif ($laporGiat->divPeng == 'Posko Bencana') {
                $nilai->pengPosko += '2';
            }
            $nilai->update();
        } else {
            $laporGiat = new laporGiat;
            $laporGiat->nomorKegiatan = $request->get('nomorKegiatan');
            $laporGiat->tanggalKegiatan = $request->get('tanggalKegiatan');
            $laporGiat->waktuKeberangkatan = $request->get('waktuKeberangkatan');
            $laporGiat->jenisKegiatan = $request->get('jenisKegiatan');
            $laporGiat->namaPetugas = $request->get('namaPetugas');
            $laporGiat->divPeng = $request->get('divPeng');
            $laporGiat->unitKendaraan = $request->get('unitKendaraan');
            $laporGiat->namaPemohon = $request->get('namaPemohon');
            $laporGiat->nomorPemohon = $request->get('nomorPemohon');
            $laporGiat->penjemputan = $request->get('penjemputan');
            $laporGiat->pengantaran = $request->get('pengantaran');
            // $laporGiat->dokumentasi = $image_name;
            $laporGiat->dataPendukung = $request->get('dataPendukung');
            $laporGiat->idLogin = Auth::user()->id;
            $laporGiat->save();

            $nilai = nilaiAnggota::where('idLogin', $laporGiat->idLogin)->first();
            if ($laporGiat->divPeng == "Paramedis") {
                $nilai->pengPara += '2';
                $nilai->update();
            } elseif ($laporGiat->divPeng == 'Navigasi') {
                $nilai->pengNavi += '2';
                $nilai->update();
            } elseif ($laporGiat->divPeng == 'Evakuasi') {
                $nilai->pengEvak += '2';
                $nilai->update();
            } elseif ($laporGiat->divPeng == 'Posko Bencana') {
                $nilai->pengPosko += '2';
                $nilai->update();
            }
        }
        return redirect()->route('inputUser.halPeng');
    }
}
