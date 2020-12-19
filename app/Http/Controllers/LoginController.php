<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
public function login(Request $request)
{
    $request->validate([
        "email"=>'required',
        "password"=>'required'
    ]);
    
}


}



