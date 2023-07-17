<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HalVeriController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->admin == 1) {
            $user = User::where('admin', '0')->get();
            return view('veriUser.halVeri', compact('user'));
        } else {
            return view('home');
        }
    }

    public function edit($user)
    {
        $user = User::where('id', $user)->first();
        return view('veriUser.editVeri', compact('user'));
    }

    public function destroy($user)
    {
        User::where('id', $user)->delete();
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->save();
        return redirect()->route('veriUser.halVeri');
    }
}
