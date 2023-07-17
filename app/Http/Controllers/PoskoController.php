<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PoskoController extends Controller
{
    public function index(){
        return view('knowledge.posko');
    }
}
