<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use Uuids;
    
    protected $dates = [
        'created_at', 
        'updated_at',
        'ph_initiated_at',
    ];
    
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;
    
    public function sender_data(){
    	return $this->hasOne('App\User', 'id', 'sender');
    }
    
    public function receiver_data(){
    	return $this->hasOne('App\User', 'id', 'receiver');
    }
    
    public function category_data()
    {
       return $this->hasOne('App\Category', 'id', 'category');
    }
    
}
