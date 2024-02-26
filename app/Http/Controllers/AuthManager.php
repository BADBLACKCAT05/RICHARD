<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session; // Add this line

class AuthManager extends Controller
{
    function contact(){
        return view('contact');
    }
    
    function newfront(){
        return view('newfront');
    }

    function homepage(){
        return view('homepage');
    }

    function frontpage(){
        $user = Auth::user();
        return view('frontpage', compact('user'));
    }

    function login(){
        if(Auth::check()){
            return redirect(route('frontpage'));
        }
        return view('login');
    }

    function registration(){
        if(Auth::check()){
            return redirect(route('frontpage'));
        }
        return view('registration');
    }
   
    function bookings(){
        if(Auth::check()){
            return redirect(route('frontpage'));
        }
        return view('bookings');
    }

    function loginpost(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
    
        $credentials = $request->only(['email', 'password']);
    
        if(Auth::attempt($credentials)){
            return redirect(route('frontpage'))->with("success", "Login successful");
        }
    
        return redirect(route('login'))->with("error", "Login failed");
    }

    function registrationpost(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed', // Add the 'confirmed' rule
        ]);
    
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
    
        try {
            $user = User::create($data);
            return redirect(route('login'))->with("success", "Registration successful");
        } catch (\Exception $e) {
            return redirect(route('registration'))->with("error", "Registration failed: " . $e->getMessage());
        }
    }

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('login'))->with("success", "Logout successful");
    }
}
