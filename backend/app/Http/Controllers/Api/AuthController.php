<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
        $rules = array(
            'email' => 'required',
            'password' => 'required | min:8'
        );
        $message = [
            'email.required' => 'email are Required ',
            'password.required' => 'password are required',
            'password.min' => 'password are minimum 8 letter',
        ];
        $validation = Validator::make($request->all(), $rules, $message);
        // $user = Auth::user();

        if ($validation->fails()) {
            return response()->json(['status' => false, 'message' => $validation->errors()]);
        } else {
            $user = User::Where('email', $request->email)->first();
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json(['status' => false, 'message' => 'Email and Password are Not Matched']);
            } else {
                $token = $user->createToken('apitoken')->plainTextToken;

                return response()->json(['status' => true, 'token' => $token, 'user' => $user]);
            }
        }
    }
    public function register(Request $request)
    {
        $rules = array(
            'name' => 'required | min:2',
            'email' => 'required | min:5 | unique:users',
            'password' => 'required | min:8 '
        );
        // $role = assignRole('user');
        $message = [
            'name.required' => " Name Are Required",
            'name.min' => "Name Minimum 3 Letter  ",
            'password.required' => "The Password Are Required",
            'password.min' => "Enter Password Minimum 8 Letter ",
            'email.unique' => "This Email are AllReady used try other Email or login account",
        ];
        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validation->errors()
            ], 422);
        } else {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::Make($request->password),
            ]);
            $token = $user->createToken('apitoken')->plainTextToken;
            $user->assignRole('user');
            return response()->json(['status' => true, 'message' => 'User registered successfully', 'user' => $user, 'token' => $token], 201);
        }
    }
    public function profile(Request $request)
    {
        return response()->json(['status' => true, 'user' => $request->user()], 200);
    }
    public function logout(Request $request)
    {

        $token = $request->user()?->currentAccessToken();
        if ($token) {
            $token->delete();
        }
        return response()->json([
            'status' => true,
            'message' => "Logged out Successfully"
        ]);
    }
}
