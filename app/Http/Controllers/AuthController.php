<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function Register(Request $request)
    {
        $valided = Validator::make($request->all(),[

            'email'=>'required|email',
            'password'=>'required',
            'phone'=>'required|integer',
            'ispro'=>'required|boolean',
            'isadmin'=>'required|boolean',
            'name'=>'required',
            'local'=>'required'
        ]);

        if($valided->fails()){
            return response()->json(['status_code'=>400,'message'=>'Bad request']);
        }

        $user = new User();
        $user->ispro = $request->ispro;
        $user->isadmin = $request->isadmin;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->password = $request->password;
        $user->local = $request->local;
        $user->save();

        return response()->json([
            'statu_code'=>200,
            'message'=>'User is created successfully !!!'
        ]);

    }

    public function login(Request $request)
    {
        $valided = Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if($valided->fails()){
            return response()->json([
                'status_code'=>400,
                'message'=>'Bad request'
            ]);
        }
        $credential = request(['email','password']);
        if(!Auth::attempt($credential)){
            return response()->json([
                'status_code'=>500,
                'message'=>'unauthorised'
            ]);
        }
        $user = User::where('email',$request->email)->first();
        $tokenResult = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'status_code'=>500,
            'token'=>$tokenResult
        ]);

    }
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'status_code'=>500,
            'message'=>'token deleted successfully'
        ]);
    }
}
