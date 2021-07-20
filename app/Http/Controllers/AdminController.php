<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admins;
use App\Models\User;

class AdminController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin');
        $this->middleware('owner');
    }

    public function index(){
        return view('home');
    }

    public function createadmin(Request $request){
        $level = 'admin';
        //use eloquent model
        $admin = new Admins;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = $request->password;
        $admin->level = $request->$level;

        $admin->save();
        return response()->json(['message'=>'admin createadmin success']);
    }

   

}
