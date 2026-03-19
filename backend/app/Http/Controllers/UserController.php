<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function get(){
        $user= User::all();
    }
    // public function VerifySaler(Request $request){
    //      $rolled = $request->user()->load('rolle')->rolle->name;
    //     return response()->json(['status'=>true,"user"=>$request->user(),"rolled"=>$rolled ?? null],200);
    // }
   
}
