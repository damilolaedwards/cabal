<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eventgoing extends Model


{

protected $table = 'eventgoings';

	 protected $fillable = [
        'user_id',
        'event_id',
        'going',
        
    ];
    public function user(){
    	return $this->belongsTo('\App\User');
    }
    public function going(){
    	return $this->hasMany('\App\Eventgoing');
    }
}
