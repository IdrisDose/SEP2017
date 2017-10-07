<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['id','user_id','name','description','price','active','completed','private'];

    public function isActive(){
        return $this->active?'Yes':'No';
    }
    public function isComplete(){
        return $this->completed?'Yes':'No';
    }
    public function isPrivate(){
        return $this->private?'Yes':'No';
    }
    public function getOwner(){
        $owner = User::where('id',$this->user_id)->first();
        return $owner->name;
    }
}
