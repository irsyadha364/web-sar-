<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\kerjaTim;
use App\Models\komunikasi;
use Illuminate\Support\Facades\Auth;
class HalKriteriaController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->admin == 1) {
            return view('kriteria.halKriteria');
        } else {
            return view('home');
        }
    }
}
