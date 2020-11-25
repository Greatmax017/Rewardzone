<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
     public function ref_category()
    {
       return $this->hasOne('App\Category', 'id', 'min_withdraw_cat');
    }
}
