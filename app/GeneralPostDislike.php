<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralPostDislike extends Model


{

protected $table = 'generalpostdislikes';

	 protected $fillable = [
        'user_id',
        'post_id',
        'dislike',
        
    ];
    public function user(){
    	return $this->belongsTo('\App\User');
    }
    public function generalpostdislikes(){
    	return $this->hasMany('\App\GeneralPostDislike');
    }
}
