<?php

namespace App\Http\Controllers;

use App\User;
use App\Sponsorship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //add auth package

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('home');
    }
    public function admin(){
        return view('admin');
    }
    public function dash($type){
        $students = User::where('acctype','=','student')->get();
        $sponsorships = Sponsorship::all();
        if(Auth::user()->isStudent()){
            return view('std-dash');
        }elseif(Auth::user()->isSponsor()){
            return view('spn-dash', compact('students'))->with('sponsorships',$sponsorships);
        }
        return view('index');
    }
}
