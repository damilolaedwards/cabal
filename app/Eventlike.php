<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eventlike extends Model


{

protected $table = 'eventlikes';

	 protected $fillable = [
        'user_id',
        'event_id',
        'like',
        
    ];
    public function user(){
    	return $this->belongsTo('\App\User');
    }
    public function likes(){
    	return $this->hasMany('\App\Eventlike');
    }
}
