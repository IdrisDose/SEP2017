<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['id','name','description','price','active','completed','private'];

    public function isActive(){
        return $this->active?'Yes':'No';
    }
    public function isComplete(){
        return $this->completed?'Yes':'No';
    }
}
