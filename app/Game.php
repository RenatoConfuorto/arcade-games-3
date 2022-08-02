<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function versions(){
        return $this->hasMany('App\GameVersion');
    }
}
