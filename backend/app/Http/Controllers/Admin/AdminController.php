<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function verifyAdmin(Request $request)
    { 
         $user = $request->user();
        $rolled = $user->load('rolle')->rolle->name;
        return response()->json(['status' => true, "user" => $user, "rolled" => $rolled ?? null], 200);
    }
}
