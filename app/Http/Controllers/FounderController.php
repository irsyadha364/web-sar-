<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FounderController extends Controller
{
    public function index(){
        return view('founder.founder');
    }
}
