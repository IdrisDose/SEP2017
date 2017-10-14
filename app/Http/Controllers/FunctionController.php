<?php

namespace App\Http\Controllers;

use App\Task;
use App\Sponsorship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //add auth package

class FunctionController extends Controller
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

    public function newsponsor(Request $req){
        $data = $req->all();
        $sponsorship = new Sponsorship();
        if(Auth::user()->isSponsor()){
            $sponsorship->create($data);
        }
        return back();

    }

    public function removesponsor($id){
        if(Auth::user() && Auth::user()->isSponsor()){
            $sponsor = Auth::user()->id;
            $sponsorship = Sponsorship::where('student_id',$id)->where('sponsor_id',$sponsor);
            $sponsorship->delete();
            return redirect(route('dashboard',Auth::user()->acctype));

        }
        return back();
    }

    public function editsponsor($id){
        $sponsorship = Sponsorship::where('id',$id)->first();
        return view('editsponsor',compact('sponsorship',$sponsorship));
    }

    public function savesponsor($id,Request $req){
        $sponsorship = Sponsorship::where('id',$id)->first();
        $sponsorship->amount = $req->input('amount');

        if(Auth::user() && Auth::user()->isSponsor() && ($sponsorship->sponsor->id == Auth::user()->id)){
            $sponsorship->save();
            return redirect(route('dashboard',Auth::user()->acctype));
        }
    }
}
