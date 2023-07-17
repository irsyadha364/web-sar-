<?php

namespace App\Http\Controllers;
use App\Models\inputGiat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InfoSARController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->admin == 0) {
            $inputGiat = inputGiat::all();
            return view('infoSAR.infoSAR', compact('inputGiat'));
        } else {
            return view('home');
        }
    }
}
