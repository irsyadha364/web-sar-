<?php

namespace App\Http\Controllers;

use App\Models\inputGiat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HalGiatController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->admin == 1) {
            $inputGiat = inputGiat::all();
            return view('kumpulGiat.halGiat', compact('inputGiat'));
        } else {
            return view('home');
        }
    }

    public function edit($inputGiats)
    {
        $inputGiat = inputGiat::where('id', $inputGiats)->first();
        return view('kumpulGiat.editGiat', compact('inputGiat'));
    }

    public function destroy($inputGiat)
    {
        inputGiat::where('id', $inputGiat)->delete();
        return redirect()->back();
    }

    public function update(Request $request, $id)
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

        $inputGiat = inputGiat::find($id);
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
