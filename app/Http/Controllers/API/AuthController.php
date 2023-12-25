<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth\SessionGuard;
use App\Models\User;


class AuthController extends Controller
{
    public function register(Request $request)  {

        $validator=Validator::make($request->all(),[

            'name'=>'required|string|max:250',
            'email'=>'required|max:250|email|unique:users',
            'password'=>'required|string|min:8'
        ]);

        if($validator->fails())
        return response()->json($validator->errors());

        $user=User::create([

            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        $token=$user->createToken('auth_token')->plainTextToken;

        return response()->json(['data'=>$user,'acess_token'=>$token,'token_type'=>'Bearer',]);
    }

     public function login(Request $request){
        if(!Auth::guard('web')->attempt($request->only('email', 'password'))){
            return response()->json(['message'=>'Unauthorized'], 401);
        }
        

        $user = User::where('email', $request['email'])->first();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message'=>'Hi ' .$user->name. ' Welcome to Home.', 'access_token'=>$token, 'token_type'=>'Bearer',
        ]);
     }

     public function logout() {
        auth()->user()->tokens()->delete();
        return[
            'message'=>'You have successfully logged out and the token was successfully deleted'
        ];       
     }
}
