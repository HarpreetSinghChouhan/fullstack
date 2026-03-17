<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function profile(Request $request){
        return response()->json(['status'=>true,'message'=>$request->user()],200);
    }
}
