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
        'id','fname','lname', 'email', 'password','acctype','website','company','aboutme','avatar','balance', 'degree_id', 'active', 'admin',
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

    public function hasResume(){
        $list = Document::where('user_id',$this->id)->get();
        $amount = count($list);
        return  ($amount!=0);
    }
    public function getAccType(){
        return ucfirst($this->acctype);
    }
    public function getDegree(){
        $id = $this->degree_id;
        $degree = Degree::where('id','=',$id)->first();
        return $id==0?'None':$degree->name;
    }

    public function getBalance(){
        return '$' . number_format($this->balance, 2);
    }
    public function getName(){
        return $this->fname.' '. $this->lname;
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }

    public function documents(){
        return $this->hasMany(Document::class);
    }

    public function studentIsSponsored($id){
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

    public function sponsor_student_list(){
        return Sponsorship::where('sponsor_id',$this->id)->get();
    }

    public function hasAboutMe(){
        return false;
    }

    private function get_percentage($total, $number)
    {
        if ( $total > 0 ) {
            return round($number / ($total / 100),2);
        } else {
            return 0;
        }
    }

    public function updateSponsorBalance(){
        $list = Sponsorship::where('sponsor_id',$this->id)->get();
        $amount = 0.00;
        foreach($list as $spn){
            $amount += $spn->amount;
        }
        $this->payout($amount);
    }

    public function updateStudentBalance(){
        $list = Sponsorship::where('student_id',$this->id)->get();
        $amount = 0.00;
        foreach($list as $spn){
            $amount += $spn->amount;
        }
        $this->addBalance($amount);
    }

    //Adds balance to a user
    public function addBalance($amount){
        $this->balance += $amount;
        $this->save();
    }

    //Removes Balance from user
    public function payout($amount){
        $this->balance -= $amount;
        $this->save();
    }

    public function setAvatar($filename){
        $this->avatar = $filename;
        $this->save();
    }
}
