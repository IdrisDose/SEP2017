<?php

namespace App\Http\Controllers;

use App\User;
use App\Degree;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //add auth package


class PageController extends Controller
{
    //
    public function index(){
        return view('index');
    }
    public function account($id){
        $user = User::find($id);
        $degrees = Degree::all();
        return view('account',compact('degrees'))->with('user',$user);
    }
    public function editaccount(Request $req, $id){
        //If user is logged in and user is either admin or user being edited
        if(Auth::user() && (Auth::user()->isAdmin() || Auth::user()->id == $id)){
            $user = User::where('id',$id);
            $data = $req->except(['_token','_method']);
            $user->update($data);
            return redirect()->route('profile',$id);
        }
        return redirect()->route('profile',$id);
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
    public function about(){
        return view('about');
    }
    public function help(){
        return view('help');
    }
}
