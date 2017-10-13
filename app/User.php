<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    use Notifiable;

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'id','name', 'email', 'password','acctype','website','company','balance', 'degree_id', 'active', 'admin',
    ];

    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    protected $hidden = [
        'password', 'remember_token', 'admin',
    ];

    public function isAdmin(){
        return $this->admin;
    }

    public function isStudent(){
        return $this->acctype=='student';
    }
    public function isSponsor(){
        return $this->acctype=='sponsor';
    }
    public function isActive(){
        return $this->active?'Yes':'No';
    }

    public function isSponsored(){
        return $this->sponsoredBy()>0?'Yes':'No';
    }

    public function isSponsoring(){
        return $this->sponsoring()>0?'Yes':'No';
    }

    public function getDegree(){
        $id = $this->degree_id;
        $degree = Degree::where('id','=',$id)->first();
        return $id==0?'None':$degree->name;
    }

    public function getBalance(){
        $count = $this->sponsoredBy();
        if($count > 0){
            $this->balance = ($count*5.00);
        }
        return $this->balance;
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }

    public function alreadySponsored($id){
        $sponsor = Sponsorship::where('student_id',$this->id)->where('sponsor_id',$id)->get();
        $count = count($sponsor);
        return ($count!=0);
    }
    public function sponsoredBy(){
        $list = Sponsorship::where('student_id',$this->id)->get();
        $count = count($list);
        return $count;
    }

    public function sponsoring(){
        $list = Sponsorship::where('sponsor_id',$this->id)->get();
        $count =  count($list);
        return $count;
    }

    public function getSponsorRate(){
        $usercount = count(User::all()->where('acctype','student'));
        $sponsorcount = $this->sponsoring();
        $math = $this->get_percentage($usercount,$sponsorcount);
        return $math;
    }
    /*
    I know this is bad naming but...
    returns list of sponsors
    */
    public function student_sponsor_list(){
        return Sponsorship::where('student_id',$this->id)->get();
    }

    private function get_percentage($total, $number)
    {
        if ( $total > 0 ) {
            return round($number / ($total / 100),2);
        } else {
            return 0;
        }
    }
}
