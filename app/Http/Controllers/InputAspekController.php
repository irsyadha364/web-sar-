<?php

namespace App\Http\Controllers;
use App\Models\aspek;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class InputAspekController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->admin == 1) {
            return view('aspek.inputAspek');
        } else {
            return view('home');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'aspekNilai' => 'required',
            'bobotCore' => 'required',
            'bobotSecondary' => 'required',
        ]);

        $aspek = new aspek;
        $aspek->idLogin = Auth::user()->id;
        $aspek->aspekNilai = $request->get('aspekNilai');
        $aspek->bobotCore = $request->get('bobotCore');
        $aspek->bobotSecondary = $request->get('bobotSecondary');
        $aspek->save();
        return redirect()->route('aspek.halAspek');
    }
}
