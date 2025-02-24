<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function index(){
        return view('front.auth');
    }

    public function register(Request $request){
       $request->validate([
        'name' => 'required|max:255|unique:users',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|confirmed' 
       ]);

       $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password)
       ]);
       
       Auth::login($user);

    }
}
