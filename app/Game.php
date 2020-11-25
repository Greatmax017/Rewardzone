<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    //
    public function stakes(){
        return $this->hasMany('App\Stake');
    }
}
