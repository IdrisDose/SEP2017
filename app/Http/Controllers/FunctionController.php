<?php

namespace App\Http\Controllers;

use App\User;
use App\Degree;
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
        var_dump($req->file());
        if($req->hasFile('avatar')){
            $avatar = $req->file('avatar');
            $filename = Auth::user()->id.'-'.Auth::user()->name.'.png';
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

        if(Auth::user()->isSponsor()){
            $sponsorship->create($data);
            Auth::user()->updateBalance();
        }
        return back();
    }

    public function removeSponsor($id){
        if(Auth::user() && Auth::user()->isSponsor()){
            $sponsor = Auth::user()->id;
            $sponsorship = Sponsorship::where('student_id',$id)->where('sponsor_id',$sponsor);
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

            $sponsorship->amount = $amount;
            //If user has enough money
            if($user->balance >= $sponsorship->amount){
                if(($this->sponsorCheck($amount))){
                    return back()->withInput()->withErrors(['Amount has to be greater than 0 and less than 100']);
                }
                $user->payout($amount);
                $sponsorship->save();
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
