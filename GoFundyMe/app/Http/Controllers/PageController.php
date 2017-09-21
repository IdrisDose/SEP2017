<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function home(){
      return view('home');
    }
    public function account(){
      return view('account');
    }
    public function sponsors(){
      return view('sponsors');
    }
    public function students(){
      return view('students');
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
