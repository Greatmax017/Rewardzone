<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    public function sender_data(){
    	return $this->hasOne('App\User', 'id', 'sender');
    }
    
    public function receiver_data(){
    	return $this->hasOne('App\User', 'id', 'receiver');
    }
}
