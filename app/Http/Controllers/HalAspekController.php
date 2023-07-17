<?php

namespace App\Http\Controllers;

use App\Models\aspek;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HalAspekController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->admin == 1) {
            $aspek = aspek::all();
            return view('aspek.halAspek', compact('aspek'));
        } else {
            return view('home');
        }
    }

    public function edit($aspeks)
    {
        $aspek = aspek::where('id', $aspeks)->first();
        return view('aspek.editAspek', compact('aspek'));
    }

    public function destroy($aspek)
    {
        aspek::where('id', $aspek)->delete();
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'aspekNilai' => 'required',
            'bobotCore' => 'required',
            'bobotSecondary' => 'required',
        ]);

        $aspek = aspek::find($id);
        $aspek->aspekNilai = $request->get('aspekNilai');
        $aspek->bobotCore = $request->get('bobotCore');
        $aspek->bobotSecondary = $request->get('bobotSecondary');
        $aspek->save();
        return redirect()->route('aspek.halAspek');
    }
}
