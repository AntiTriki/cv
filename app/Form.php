<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    public function level(){
        return $this -> hasMany(Level::class);

    }

    public function user(){
        return $this -> belongsTo(User::class);

    }
    public function skills(){
        return $this -> hasMany(Level::class);

    }
}
