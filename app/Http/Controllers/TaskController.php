<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //add auth package

class TaskController extends Controller
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
    public function task($id){
        $task = Task::find($id);
        return view('task')->with('task',$task);
    }
    public function tasklist(){
        $tasks = Task::all();
        return view('tasks',compact('tasks'));
    }
    public function taskform(){
        return view('newtask');
    }
    public function newtask(Request $req){
        $data = $req->all();
        $user = Auth::user();
        if($user->isSponsor()){
            $user->tasks()->create($data);
        }
        return redirect(route('tasks'));

    }
}
