<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

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
    public function task(){
        $task = Task::find($id);
        return view('task')->with('task',$task);
    }
    public function tasklist(){
        $tasks = Task::all();
        return view('tasks',compact('tasks'));
    }
}
