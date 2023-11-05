<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Hash;

class AuthController extends Controller
{
    public function login(Request $r){
        if($r->isMethod('post')){
            $user = DB::table('users')->where('email',$r->email)->first();
            if($user){
                if(Hash::check($r->password, $user->password)){
                    session()->put('user', $user);
                    return redirect()->route('admin.home')->with('success',__('Login Successffully'));
                }
                return redirect()->back()->with('error',__('Email not found !!!'));
            }
            return redirect()->back()->with('error',__('Email not found !!!'));
        }

        if(session()->has('user')){
            return redirect()->route('admin.home');
        }
        return view('backends.auths.login');
    }
    public function logout(Request $r){
        if(session()->has('user')){
            session()->forget('user');
            return redirect()->route('admin.login')->with('success',__('Logout Successfully'));
        }
    }
}
