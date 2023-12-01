<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
   
           $validateUser=$request->all();
           

if(Auth::guard('admin')->attempt(['email' => $validateUser['email']  , 'password' => 
$validateUser['password']])){
    
    $user = Auth::guard('admin')->user(); 
    $response_user = [
        'id' => $user->id,
        'name' => $user->name,
        'email' => $user->email,
        'token' => $user->createToken('token')->plainTextToken,
    ];

    return response()->json([
        'status' => true,
        'message' => 'User Logged In Successfully',
        'data' => $response_user
    ], 200);
}else{
    return response()->json([
        'status' => false,
        'message' => 'Invalid Credentials',
        'data' => []
    ], 403);
}


      
        
    }
}
