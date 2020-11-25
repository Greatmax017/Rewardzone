<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserNotificationQueue extends Model
{
    //
   protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
