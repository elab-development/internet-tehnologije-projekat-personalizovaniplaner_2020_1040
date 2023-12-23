<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)  {

        $validator=Validator::make($request->all(),[

            'name'=>'required|string|max:250',
            'email'=>'required|string|max:250|email|unique:users',
            'userpassword'=>'required|string|min:8'
        ]);

        if($validator->fails())
        return response()->json($validator->errors());

        $user=User::create([

            'name'=>$request->name,
            'email'=>$request->email,
            'userpassword'=>Hash::make($request->userpassword)
        ]);

        $token=$user->createToken('auth_token')->plainTextToken;

        return response()->json(['data'=>$user,'acess_token'=>$token,'token_type'=>'Bearer']);


        
        
    }
}
