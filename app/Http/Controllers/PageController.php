<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function index(){
        return view('index');
    }
    public function account($id){
        $user = User::find($id);
        return view('account')->with('user',$user);
    }
    public function sponsors(){
        $users = User::where('acctype','=','sponsor')->get();
        return view('sponsors',compact('users'));
    }
    public function students(){
        $users = User::where('acctype','=','student')->get();
        return view('students',compact('users'));
    }
    public function login(){
        return view('login');
    }
    public function register(){
        return view('register');
    }
    public function dash(){
        return view('dashboard');
    }
}
