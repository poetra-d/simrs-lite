<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index() 
    {
        date_default_timezone_set('Asia/Jakarta');
        $pasiens = DB::table('pasiens')->where('tanggal', date('Y-m-d'),)->count();
        return view('home.index' , compact('pasiens'));
    }
}