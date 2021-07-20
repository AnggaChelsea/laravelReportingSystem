<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    function PemasukanView(){
        return view('pages.pemasukan');
    }
}
