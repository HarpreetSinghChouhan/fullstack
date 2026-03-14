<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TestContoller extends Controller
{
    //
    public function status(){
         return response()->json(["status"=>"Api key Are Work"]);
    }
    public function user(){
        return response()->json(["name"=>"Harpreet Singh","role"=>"webdevepment"]);
    }

}
