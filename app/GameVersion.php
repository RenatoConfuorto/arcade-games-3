<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameVersion extends Model
{
    public function game(){
        return $this->belongsTo('App\Game');
    }

    public function scores(){
        return $this->hasMany('App\Score');
    }
}
