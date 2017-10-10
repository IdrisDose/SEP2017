<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    protected $fillable = ['id','sponsor_id','student_id','active'];

    public function sponsor(){
        return $this->belongsTo(User::class,'sponsor_id','id');
    }

    public function student(){
        return $this->belongsTo(User::class,'student_id','id');
    }
}
