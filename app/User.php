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
        'name', 'email', 'password', 'avatar', 'acctype','website','company', 'about', 'balance', 'degree_id', 'active', 'admin',
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

    public function getDegree(){
        $id = $this->degree_id;
        $degree = Degree::where('id','=',$id)->first();
        return $id==0?'None':$degree->name;

    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }
}
