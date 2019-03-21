<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    public function form(){
        return $this -> hasManyThrough(Form::class, Level::class, 'skill_id', 'id','id','id');

    }
}
