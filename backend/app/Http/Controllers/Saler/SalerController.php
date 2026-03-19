<?php

namespace App\Http\Controllers\Saler;

use App\Http\Controllers\Controller;
use App\Models\Rolles;
use Illuminate\Http\Request;

class SalerController extends Controller
{
    //
    public function VerifySaler(Request $request){
         $rolled = $request->user()->load('rolle')->rolle->name;
        return response()->json(['status'=>true,"user"=>$request->user(),"rolled"=>$rolled ?? null],200);
    }
}
