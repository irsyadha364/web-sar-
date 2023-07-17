<?php

namespace App\Http\Controllers;

use App\Models\laporLatih;
use App\Models\nilaiAnggota;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HalPelController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->admin == 0) {
            $laporLatih = laporLatih::where('idLogin', Auth::user()->id)->get();
            return view('inputUser.halPel', compact('laporLatih'));
        } else {
            return view('home');
        }
    }

    public function edit($laporLatihs)
    {
        $laporLatih = laporLatih::where('id', $laporLatihs)->first();
        return view('inputUser.editPel', compact('laporLatih'));
    }

    public function destroy($laporLatih)
    {
        $temp = laporLatih::find($laporLatih);
        $nilai = nilaiAnggota::where('idLogin', $temp->idLogin)->first();
        if($temp->divPel == 'Paramedis'){
            $nilai->pelPara -= '1';
        }
        if($temp->divPel == 'Navigasi'){
            $nilai->pelNavi -= '1';
        }
        if($temp->divPel == 'Evakuasi'){
            $nilai->pelEvak -= '1';
        }
        if($temp->divPel == 'Posko Bencana'){
            $nilai->pelPosko -= '1';
        }
        $nilai->update();
        laporLatih::where('id', $laporLatih)->delete();
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'namaKegiatan' => 'required',
            'divPel' => 'required',
            'tanggalKegiatan' => 'required',
            'peran' => 'required',
        ]);

        $laporLatih = laporLatih::find($id);
        $laporLatih->namaKegiatan = $request->get('namaKegiatan');

        $prev = $laporLatih->divPel;

        $laporLatih->divPel = $request->get('divPel');
        $laporLatih->tanggalKegiatan = $request->get('tanggalKegiatan');
        $laporLatih->peran = $request->get('peran');
        $laporLatih->save();

        $nilai = nilaiAnggota::where('idLogin', Auth::user()->id)->first();
        if($prev == 'Paramedis'){
            $nilai->pelPara -= '1';
            if($laporLatih->divPel == 'Navigasi'){
                $nilai->pelNavi += '1';
                $nilai->update();
            }
            elseif($laporLatih->divPel == 'Evakuasi'){
                $nilai->pelEvak += '1';
                $nilai->update();
            }
            elseif($laporLatih->divPel == 'Posko Bencana'){
                $nilai->pelPosko += '1';
                $nilai->update();
            }
        } elseif($prev == 'Navigasi'){
            $nilai->pelNavi -= '1';
            if($laporLatih->divPel == 'Paramedis'){
                $nilai->pelPara += '1';
                $nilai->update();
            }
            elseif($laporLatih->divPel == 'Evakuasi'){
                $nilai->pelEvak += '1';
                $nilai->update();
            }
            elseif($laporLatih->divPel == 'Posko Bencana'){
                $nilai->pelPosko += '1';
                $nilai->update();
            }
        }
        elseif($prev == 'Evakuasi'){
            $nilai->pelEvak -= '1';
            if($laporLatih->divPel == 'Paramedis'){
                $nilai->pelPara += '1';
                $nilai->update();
            }
            elseif($laporLatih->divPel == 'Navigasi'){
                $nilai->pelNavi += '1';
                $nilai->update();
            }
            elseif($laporLatih->divPel == 'Posko Bencana'){
                $nilai->pelPosko += '1';
                $nilai->update();
            }
        }
        elseif($prev == 'Posko Bencana'){
            $nilai->pelPosko -= '1';
            if($laporLatih->divPel == 'Paramedis'){
                $nilai->pelPara += '1';
                $nilai->update();
            }
            elseif($laporLatih->divPel == 'Navigasi'){
                $nilai->pelNavi += '1';
                $nilai->update();
            }
            elseif($laporLatih->divPel == 'Evakuasi'){
                $nilai->pelEvak += '1';
                $nilai->update();
            }
        }
        return redirect()->route('inputUser.halPel');
    }
}
