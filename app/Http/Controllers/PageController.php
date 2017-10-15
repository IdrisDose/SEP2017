<?php

namespace App\Http\Controllers;

use App\User;
use App\Degree;
use App\Task;
use App\Sponsorship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //add auth package
use Image;


class PageController extends Controller
{
    public function home(){
        return view('index');
    }

    public function account($id){
        $user = User::find($id);
        $degrees = Degree::all();
        return view('account',compact('degrees'))->with('user',$user);
    }

    public function sponsors(){
        $users = User::where('acctype','=','sponsor')->get();
        return view('sponsors',compact('users'));
    }

    public function students(){
        $users = User::where('acctype','=','student')->get();
        return view('students',compact('users'));
    }

    public function task($id){
        $task = Task::find($id);
        return view('task')->with('task',$task);
    }

    public function taskList(){
        $tasks = Task::all();
        return view('tasks',compact('tasks'));
    }

    public function about(){
        return view('about');
    }

    public function help(){
        return view('help');
    }

    public function dash(){
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
