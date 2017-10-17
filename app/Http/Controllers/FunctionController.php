<?php

namespace App\Http\Controllers;

use App\User;
use App\Degree;
use App\Task;
use App\Sponsorship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //add auth package
use Illuminate\Support\Facades\DB;
use Image;
use Log;

class FunctionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    public function taskform(){
        return view('newtask');
    }

    public function editAccount(Request $req, $id){
        //If user is logged in and user is either admin or user being edited
        if(Auth::user() && (Auth::user()->isAdmin() || Auth::user()->id == $id)){
            $user = User::where('id',$id);
            $data = $req->except(['_token','_method']);
            $user->update($data);
            return redirect()->route('profile',$id);
        }
        return redirect()->route('profile',$id);
    }

    public function updateAvatar(Request $req){
        $req->validate([
           'avatar' => 'required|image'
        ]);

        if($req->hasFile('avatar')){
            $avatar = $req->file('avatar');
            $name = str_replace(' ', '_', Auth::user()->getName());
            $filename = Auth::user()->id.'-'.$name.'.png';
            Image::make($avatar)->resize(150,150)->save(public_path('/uploads/avatars/' . $filename ));
            $user = Auth::user();
            $user->setAvatar($filename);
            return back();
        }
        return redirect()->route('index');
    }

    public function newTask(Request $req){
        $data = $req->all();
        $user = Auth::user();
        if($user->isSponsor()){
            $user->tasks()->create($data);
        }
        return redirect(route('tasks'));
    }

    public function newSponsor(Request $req){
        $data = $req->all();
        $sponsorship = new Sponsorship();
        $student = User::where('id',$data['student_id'])->first();

        if(Auth::user()->isSponsor()){
            $sponsorship->create($data);
            Auth::user()->payout('5.00');
            $student->updateStudentBalance();
        }
        return back();
    }

    public function removeSponsor($id){
        if(Auth::user() && Auth::user()->isSponsor()){
            $sponsor = Auth::user()->id;
            $sponsorshipTmp = Sponsorship::all();
            $sponsorship = $sponsorshipTmp->where('id',$id)->first();

            Log::info($sponsorship);

            $sid = $sponsorship->student_id;

            User::where('id',$sid)->first()->payout($sponsorship->amount);
            $sponsorship->delete();
            return redirect(route('dashboard'));
        }
        return back();
    }

    public function editSponsor($id){
        $sponsorship = Sponsorship::where('id',$id)->first();
        return view('editsponsor',compact('sponsorship',$sponsorship));
    }

    public function saveSponsor($id,Request $req){
        $req->validate([
           'amount' => 'required|regex:/^\d*(\.\d{1,2})?$/'
        ]);

        $sponsorship = Sponsorship::where('id',$id)->first();
        if(Auth::user() && Auth::user()->isSponsor() && ($sponsorship->sponsor->id == Auth::user()->id)){

            $user = Auth::user();
            $amount = $req->input('amount');
            $student = $sponsorship->student()->first();


            $student->payout($sponsorship->amount);
            $sponsorship->amount = $amount;

            //If user has enough money
            if($user->balance >= $sponsorship->amount){
                if(($this->sponsorCheck($amount))){
                    return back()->withInput()->withErrors(['Amount has to be greater than 0 and less than 100']);
                }
                $user->payout($amount);
                $sponsorship->save();

                $student->addBalance($amount);
            } else{
                return back()->withInput()->withErrors(['You do not have enough money']);
            }
            return redirect(route('dashboard'));
        }
        return back();
    }

    public function updateFunds(Request $req){
        $req->validate([
           'balance' => 'required|regex:/^\d*(\.\d{1,2})?$/'
        ]);

        $amount = $req->input('balance');
        if(Auth::user()){
            if($this->balCheck($amount)){
                return back()->withInput()->withErrors(['Amount has to be greater than 0 but less than 250']);
            }
            $user = Auth::user();
            $user->addBalance($amount);
            return redirect(route('dashboard'));
        }
        return back();
    }



    private function sponsorCheck($amount){
        return $this->priceCheck($amount,5,100);
    }
    private function balCheck($amount){
        return $this->priceCheck($amount,1,250);
    }

    //Amount Check
    //Input Amount to validat
    //Max == maxmum amount allowed
    private function priceCheck($amount,$min,$max){
        if(($amount < 0 )|| $amount > $max){
            return true;
        }
        return false;
    }
}
