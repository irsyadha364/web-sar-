<?php

namespace App\Http\Controllers;

use App\Models\inputGiat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KumpulGiatController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->admin == 1) {
            return view('kumpulGiat.kumpulGiat');
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
            'unitKendaraan' => 'required',
            'namaPemohon' => 'required',
            'nomorPemohon' => 'required',
            'penjemputan' => 'required',
            'pengantaran' => 'required',
            'tingkatKasus' => 'required',
        ]);

        $inputGiat = new inputGiat;
        $inputGiat->nomorKegiatan = $request->get('nomorKegiatan');
        $inputGiat->tanggalKegiatan = $request->get('tanggalKegiatan');
        $inputGiat->waktuKeberangkatan = $request->get('waktuKeberangkatan');
        $inputGiat->jenisKegiatan = $request->get('jenisKegiatan');
        $inputGiat->unitKendaraan = $request->get('unitKendaraan');
        $inputGiat->namaPemohon = $request->get('namaPemohon');
        $inputGiat->nomorPemohon = $request->get('nomorPemohon');
        $inputGiat->penjemputan = $request->get('penjemputan');
        $inputGiat->pengantaran = $request->get('pengantaran');
        $inputGiat->tingkatKasus = $request->get('tingkatKasus');
        $inputGiat->save();
        return redirect()->route('kumpulGiat.halGiat');
    }
}
