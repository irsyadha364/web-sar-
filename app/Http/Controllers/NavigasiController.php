<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavigasiController extends Controller
{
    public function index(){
        return view('knowledge.navigasi');
    }
}
