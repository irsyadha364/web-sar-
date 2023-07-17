<?php

namespace App\Http\Controllers;

use App\Models\laporGiat;
use App\Models\nilaiAnggota;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HalPengController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->admin == 0) {
            $laporGiat = laporGiat::where('idLogin', Auth::user()->id)->get();
            return view('inputUser.halPeng', compact('laporGiat'));
        } else {
            return view('home');
        }
    }

    public function edit($laporGiats)
    {
        $laporGiat = laporGiat::where('id', $laporGiats)->first();
        return view('inputUser.editPeng', compact('laporGiat'));
    }

    public function destroy($laporGiat)
    {
        $temp = laporGiat::find($laporGiat);
        $nilai = nilaiAnggota::where('idLogin', $temp->idLogin)->first();
        if($temp->divPeng == 'Paramedis'){
            $nilai->pengPara -= '1';
        }
        if($temp->divPeng == 'Navigasi'){
            $nilai->pengNavi -= '1';
        }
        if($temp->divPeng == 'Evakuasi'){
            $nilai->pengEvak -= '1';
        }
        if($temp->divPeng == 'Posko Bencana'){
            $nilai->pengPosko -= '1';
        }
        $nilai->update();
        laporGiat::where('id', $laporGiat)->delete();
        return redirect()->back();
    }

    public function update(Request $request, $id)
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
            'dataPendukung' => 'required',
        ]);

        $laporGiat = laporGiat::find($id);
        $laporGiat->nomorKegiatan = $request->get('nomorKegiatan');
        $laporGiat->tanggalKegiatan = $request->get('tanggalKegiatan');
        $laporGiat->waktuKeberangkatan = $request->get('waktuKeberangkatan');
        $laporGiat->jenisKegiatan = $request->get('jenisKegiatan');
        $laporGiat->namaPetugas = $request->get('namaPetugas');


        $prev = $laporGiat->divPeng;

        $laporGiat->divPeng = $request->get('divPeng');
        $laporGiat->unitKendaraan = $request->get('unitKendaraan');
        $laporGiat->namaPemohon = $request->get('namaPemohon');
        $laporGiat->nomorPemohon = $request->get('nomorPemohon');
        $laporGiat->penjemputan = $request->get('penjemputan');
        $laporGiat->pengantaran = $request->get('pengantaran');
        $laporGiat->dataPendukung = $request->get('dataPendukung');
        $laporGiat->save();

        $nilai = nilaiAnggota::where('idLogin', $laporGiat->idLogin)->first();
        if($prev == 'Paramedis'){
            $nilai->pengPara -= '2';
            if($laporGiat->divPeng == 'Navigasi'){
                $nilai->pengNavi += '2';
                $nilai->update();
            }
            elseif($laporGiat->divPeng == 'Evakuasi'){
                $nilai->pengEvak += '2';
                $nilai->update();
            }
            elseif($laporGiat->divPeng == 'Posko Bencana'){
                $nilai->pengPosko += '2';
                $nilai->update();
            }
        } elseif($prev == 'Navigasi'){
            $nilai->pengNavi -= '2';
            if($laporGiat->divPeng == 'Paramedis'){
                $nilai->pengPara += '2';
                $nilai->update();
            }
            elseif($laporGiat->divPeng == 'Evakuasi'){
                $nilai->pengEvak += '2';
                $nilai->update();
            }
            elseif($laporGiat->divPeng == 'Posko Bencana'){
                $nilai->pengPosko += '2';
                $nilai->update();
            }
        }
        elseif($prev == 'Evakuasi'){
            $nilai->pengEvak -= '2';
            if($laporGiat->divPeng == 'Paramedis'){
                $nilai->pengPara += '2';
                $nilai->update();
            }
            elseif($laporGiat->divPeng == 'Navigasi'){
                $nilai->pengNavi += '2';
                $nilai->update();
            }
            elseif($laporGiat->divPeng == 'Posko Bencana'){
                $nilai->pengPosko += '2';
                $nilai->update();
            }
        }
        elseif($prev == 'Posko Bencana'){
            $nilai->pengPosko -= '2';
            if($laporGiat->divPeng == 'Paramedis'){
                $nilai->pengPara += '2';
                $nilai->update();
            }
            elseif($laporGiat->divPeng == 'Navigasi'){
                $nilai->pengNavi += '2';
                $nilai->update();
            }
            elseif($laporGiat->divPeng == 'Evakuasi'){
                $nilai->pengEvak += '2';
                $nilai->update();
            }
        }
        return redirect()->route('inputUser.halPeng');
    }
}
