<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admins;
use App\Models\User;


class OwnerController extends Controller
{
    public function index(){
        return view('page/owner');
    }
    
    //listadmin
    public function add(){
        return view('owner/add');
    }


    public function addadminapi(Request $request){
        $admins = new Admins;
        $admins->name = $request->name;
        $admins->email = $request->email;
        $admins->password = $request->password;
        $admins->level = 'admin';

        $res = $admins->save();
        if($admins){
            return response()->json([
                'message' => 'success add admins',
                'code'=>200,
                'data'=>$admins 
            ]);
        }
        return response()->json([
            'message' => 'failed add admins',
            'code'=>500,
            'data'=>'error' 
        ]);
    }

    public function addadminweb(Request $request){
        $admins = new Admins;
        $level = 'admin';
        $admins->name = $request->name;
        $admins->email = $request->email;
        $admins->password = $request->password;
        $admins->level = $level;

        if($admins->save()){
           return redirect('listadmin');
        }
        return redirect('add');
    }

    function listadmin() {
        // $admins = DB::select('select * from users');
        $admins = User::paginate(5);
        return view('owner/listadmin', ['admins'=>$admins]);
    }
    function listadminapi(){
        $admins = DB::select('select * from users');
        if($admins>0){
        return response()->json([
            'message'=>'Success',
            'code'=> 200,
            'data' => $admins
        ]);
    }else{
        return response()->json([
            'message'=>'Nothing data',
            'code'=> 200,
            'data' => $admins
        ]);
    }
    }
    function listadminapiid($id){
        $admins = User::find($id);
        if($admins){
        return response()->json([
            'message'=>'Success',
            'code'=> 200,
            'data' => $admins
        ]);}else{
            return response()->json(['message'=>'data not found']);
        }
    }
    
    function delete($id){
        DB::delete('delete from users where id = ?', [$id]);
        echo "<script>alert('succes delete');</script>";
    }
    function paginateadmin(){
        $users = User::paginate(5);
        return response()->json($users, 200);
    }

   

  
    ////////////////////////////////////////////////////////////////
 
    

}