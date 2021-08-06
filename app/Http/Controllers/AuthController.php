<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function index(){
        return view('auth/login');
    }

    public function proses_login(Request $request){
        request()->validate([
            'email'=> 'required',
            'password'=> 'required',
            ]
        );

        $kredintials = $request->only('email', 'password');
        if(Auth::attempt($kredintials)){
            $user = Auth::user();
            if($user->level == 'admin'){
                return redirect()->intended('admin');
            }elseif($user->level == 'owner'){
                return redirect()->intended('chartpemasukan');
            }
            return redirect()->intended('notregister');
        }
        return redirect('notregister');
    }

    public function proses_loginApi(Request $request){
        request()->validate([
            'email'=> 'required',
            'password'=> 'required',
            ]
        );

        $input = $request->only('email', 'password');
        if(Auth::attempt($input)){
            $user = Auth::user();
            if($user->level == 'admin'){
                return response()->json(
                    [
                        "message"=>"login method succes as Admin",
                        "data"=>$user
                    ],
                );
            }elseif($user->level == 'owner'){
                return response()->json(
                    [
                        "message"=>"login method succes as owner",
                        "data"=>$user
                    ],
                );
            }
            return response()->json(
                [
                    "message"=>"login failed unregister",
                    "data"=>404
                ],
            );
        }
        return response()->json(
            [
                "message"=>"login failed error",
                "data"=>403
            ],
        );
    }
    // public function logout(Request $request ) {
    //     $request->session()->flush();
    //     Auth::logout();
    //     return Redirect('login');
    //     }

        function logout(){
            return view('auth/login');
        }

        function forgotpassword(Request $request){
            
        }


}
