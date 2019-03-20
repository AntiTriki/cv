<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    //
    public function form(){
        return $this -> belongsTo(Form::class);
    }
    public function skill(){
        return $this -> belongsTo(Skill::class);
    }

}
