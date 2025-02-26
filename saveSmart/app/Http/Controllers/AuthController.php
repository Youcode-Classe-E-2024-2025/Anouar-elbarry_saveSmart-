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
      return redirect()->route('profile-Selection');
    }

    public function login(Request $request ){
         $credentials =  $request->validate([
            'email' => 'required|email',
            'password' => 'required'
           ]);
           \Log::info('Login method accessed');
           \Log::info('Login attempt', $request->all());
          if(Auth::attempt($credentials)){
            return redirect()->route('profile-Selection');
          }else{
            return redirect()->back()->withErrors(['login' => 'password or email are wrong']);
          };

    }


    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
       return redirect('/auth');
    }
}
