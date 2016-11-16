<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertlike extends Model


{

protected $table = 'advertlikes';

	 protected $fillable = [
        'user_id',
        'advert_id',
        'like',
        
    ];
    public function user(){
    	return $this->belongsTo('\App\User');
    }
    public function advertlikes(){
    	return $this->hasMany('\App\Advertlike');
    }
}
