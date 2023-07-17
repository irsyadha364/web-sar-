<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\nilaiAnggota;
use App\Models\kerjaTim;
use App\Models\komunikasi;
use App\Models\User;

class ProfMatcController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->admin == 1) {
            $nilai = nilaiAnggota::all();
            $nilaiNa = nilaiAnggota::all();
            $nilaiEv = nilaiAnggota::all();
            $nilaiPos = nilaiAnggota::all();
            $tim = kerjaTim::all();
            $kom = komunikasi::all();
            $user = User::where('admin', '0')->get();

            #Paramedis
            foreach($nilai as $nilai){
                if($nilai->nilaiAkhir != '0.00'){
                    $nilai->nilaiAkhir = '0.00';
                    $nilai->save();

                    $count = $kom->count();
                    foreach($kom as $komu){
                        if($nilai->idLogin
                        == $komu->idLogin){
                            $nilaiKom = $komu->nilaiKom;
                        }
                        elseif($count == 1){
                            $nilaiKom = 0;
                        }
                        else{
                            $count--;
                        }
                    }

                    $count = $tim->count();
                    foreach($tim as $tims){
                        if($nilai->idLogin == $tims->idLogin){
                            $nilaiTim = $tims->nilaiTim;
                        }
                        elseif($count == 1){
                            $nilaiTim = 0;
                        }
                        else{
                            $count--;
                        }
                    }

                    $nilaiPara = ((($nilai->pengPara + $nilai->pelPara + $nilaiKom)/2)*0.7) + ((($nilai->pengEvak + $nilai->pelEvak+ + $nilaiTim)/2)*0.3);
                    $nilai->nilaiAkhir = $nilaiPara;
                    $nilai->save();
                }
                else{
                    $count = $kom->count();
                    foreach($kom as $komu){
                        if($nilai->idLogin
                        == $komu->idLogin){
                            $nilaiKom = $komu->nilaiKom;
                        }
                        elseif($count == 1){
                            $nilaiKom = 0;
                        }
                        else{
                            $count--;
                        }
                    }

                    $count = $tim->count();
                    foreach($tim as $tims){
                        if($nilai->idLogin == $tims->idLogin){
                            $nilaiTim = $tims->nilaiTim;
                        }
                        elseif($count == 1){
                            $nilaiTim = 0;
                        }
                        else{
                            $count--;
                        }
                    }
                    $nilaiPara = ((($nilai->pengPara + $nilai->pelPara + $nilaiKom)/2)*0.7) + ((($nilai->pengEvak + $nilai->pelEvak+ + $nilaiTim)/2)*0.3);
                    $nilai->nilaiAkhir = $nilaiPara;
                    $nilai->save();
                }
            }
            $rankPara = nilaiAnggota::all()->sortByDesc('nilaiAkhir');
            #Paramedis End

            #Evakuasi
            foreach($nilaiEv as $nilai){
                if($nilai->nilaiAkhir != '0.00'){
                    $nilai->nilaiAkhir = '0.00';
                    $nilai->save();
                    #start
                    $count = $kom->count();
                    foreach($kom as $komu){
                        if($nilai->idLogin
                        == $komu->idLogin){
                            $nilaiKom = $komu->nilaiKom;
                        }
                        elseif($count == 1){
                            $nilaiKom = 0;
                        }
                        else{
                            $count--;
                        }
                    }
                    $count = $tim->count();
                    foreach($tim as $tims){
                        if($nilai->idLogin == $tims->idLogin){
                            $nilaiTim = $tims->nilaiTim;
                        }
                        elseif($count == 1){
                            $nilaiTim = 0;
                        }
                        else{
                            $count--;
                        }
                    }
                    $nilaiEvak= ((($nilai->pengEvak + $nilai->pelEvak+ + $nilaiTim)/2)*0.8) + ((($nilai->pengPara + $nilai->pelPara + $nilaiKom)/2)*0.2);
                    $nilai->nilaiAkhir = $nilaiEvak;
                    $nilai->save();
                }
                else{
                    $count = $kom->count();
                    foreach($kom as $komu){
                        if($nilai->idLogin
                        == $komu->idLogin){
                            $nilaiKom = $komu->nilaiKom;
                        }
                        elseif($count == 1){
                            $nilaiKom = 0;
                        }
                        else{
                            $count--;
                        }
                    }
                    $count = $tim->count();
                    foreach($tim as $tims){
                        if($nilai->idLogin == $tims->idLogin){
                            $nilaiTim = $tims->nilaiTim;
                        }
                        elseif($count == 1){
                            $nilaiTim = 0;
                        }
                        else{
                            $count--;
                        }
                    }
                    $nilaiEvak= ((($nilai->pengEvak + $nilai->pelEvak+ + $nilaiTim)/2)*0.8) + ((($nilai->pengPara + $nilai->pelPara + $nilaiKom)/2)*0.2);
                    $nilai->nilaiAkhir = $nilaiEvak;
                    $nilai->save();
                    }
                    $rankEvak = nilaiAnggota::all()->sortByDesc('nilaiAkhir');
                }
                #Evakuasi End

                    #Posko Bencana
                    foreach($nilaiPos as $nilai){
                        if($nilai->nilaiAkhir != '0.00'){
                            $nilai->nilaiAkhir = '0.00';
                            $nilai->save();
                            #start
                            $count = $kom->count();
                            foreach($kom as $komu){
                                if($nilai->idLogin
                                == $komu->idLogin){
                                    $nilaiKom = $komu->nilaiKom;
                                }
                                elseif($count == 1){
                                    $nilaiKom = 0;
                                }
                                else{
                                    $count--;
                                }
                            }
                            $count = $tim->count();
                            foreach($tim as $tims){
                                if($nilai->idLogin == $tims->idLogin){
                                    $nilaiTim = $tims->nilaiTim;
                                }
                                elseif($count == 1){
                                    $nilaiTim = 0;
                                }
                                else{
                                    $count--;
                                }
                            }
                            $nilaiPosko= ((($nilai->pengPosko + $nilai->pelPosko + $nilaiKom + $nilaiTim) / 3) * 0.6) + ((($nilai->pengPara + $nilai->pelPara + $nilai->pengNavi + $nilai->pelNavi) / 2) * 0.4);
                            $nilai->nilaiAkhir = $nilaiPosko;
                            $nilai->save();
                        }
                        else{
                            $count = $kom->count();
                            foreach($kom as $komu){
                                if($nilai->idLogin
                                == $komu->idLogin){
                                    $nilaiKom = $komu->nilaiKom;
                                }
                                elseif($count == 1){
                                    $nilaiKom = 0;
                                }
                                else{
                                    $count--;
                                }
                            }
                            $count = $tim->count();
                            foreach($tim as $tims){
                                if($nilai->idLogin == $tims->idLogin){
                                    $nilaiTim = $tims->nilaiTim;
                                }
                                elseif($count == 1){
                                    $nilaiTim = 0;
                                }
                                else{
                                    $count--;
                                }
                            }
                            $nilaiPosko= ((($nilai->pengPosko + $nilai->pelPosko + $nilaiKom + $nilaiTim) / 3) * 0.6) + ((($nilai->pengPara + $nilai->pelPara + $nilai->pengNavi + $nilai->pelNavi) / 2) * 0.4);
                            $nilai->nilaiAkhir = $nilaiPosko;
                            $nilai->save();
                            }
                            $rankPosko = nilaiAnggota::all()->sortByDesc('nilaiAkhir');
                        }
                    #Posko Bencana End

                    #Navigasi
                    foreach($nilaiNa as $nilai){
                        if($nilai->nilaiAkhir != '0.00'){
                            $nilai->nilaiAkhir = '0.00';
                            $nilai->save();
                            #start
                            $count = $kom->count();
                            foreach($kom as $komu){
                                if($nilai->idLogin
                                == $komu->idLogin){
                                    $nilaiKom = $komu->nilaiKom;
                                }
                                elseif($count == 1){
                                    $nilaiKom = 0;
                                }
                                else{
                                    $count--;
                                }
                            }
                            $count = $tim->count();
                            foreach($tim as $tims){
                                if($nilai->idLogin == $tims->idLogin){
                                    $nilaiTim = $tims->nilaiTim;
                                }
                                elseif($count == 1){
                                    $nilaiTim = 0;
                                }
                                else{
                                    $count--;
                                }
                            }
                            $nilaiNavi= ((($nilai->pengNavi + $nilai->pelNavi + $nilaiKom) / 2) * 0.9) + ((($nilai->pengPosko + $nilai->pelPosko) / 2) * 0.1);
                            $nilai->nilaiAkhir = $nilaiNavi;
                            $nilai->save();
                        }
                        else{
                            $count = $kom->count();
                            foreach($kom as $komu){
                                if($nilai->idLogin
                                == $komu->idLogin){
                                    $nilaiKom = $komu->nilaiKom;
                                }
                                elseif($count == 1){
                                    $nilaiKom = 0;
                                }
                                else{
                                    $count--;
                                }
                            }
                            $count = $tim->count();
                            foreach($tim as $tims){
                                if($nilai->idLogin == $tims->idLogin){
                                    $nilaiTim = $tims->nilaiTim;
                                }
                                elseif($count == 1){
                                    $nilaiTim = 0;
                                }
                                else{
                                    $count--;
                                }
                            }
                            $nilaiNavi= ((($nilai->pengNavi + $nilai->pelNavi + $nilaiKom) / 2) * 0.9) + ((($nilai->pengPosko + $nilai->pelPosko) / 2) * 0.1);
                            $nilai->nilaiAkhir = $nilaiNavi;
                            $nilai->save();
                            }
                            $rankNavi = nilaiAnggota::all()->sortByDesc('nilaiAkhir');
                        }
                    #Navigasi End


            return view('profMatc.profMatc', compact('rankPara', 'rankNavi', 'rankEvak', 'rankPosko', 'user'));
        } else {
            return view('home');
        }
    }
}
