<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class PemasukanController extends Controller
{
    function PemasukanView(){
        return view('pages.pemasukan');
    }
   
    function count($price){
        $datacount = DB::select('select * from where price'.$price);
        $result = $price * '$datacount';
        return view('pages/count', ['count'=>$result]);
    }

    function filter(Request $request, $name){
        $search = $request->name;
        $result = User::find($search);
    }

    function viewList(){
        $datalist = DB::select('select * from orderlists');
        return view('pages/orderlist', ['orderlists'=>$datalist]);
    }

    function viewdetails(Request $request, $id){

    }

  
}
