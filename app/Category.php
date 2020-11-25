<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function default_user_data(){
    	return $this->hasOne('App\User', 'id', 'default_user');
    }
    
    public function next_user_data(){
    	return $this->hasOne('App\User', 'id', 'next_match');
    }
}
