<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EvakuasiController extends Controller
{
    public function index(){
        return view('knowledge.evakuasi');
    }
}
