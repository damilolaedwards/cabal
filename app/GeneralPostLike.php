<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralPostLike extends Model


{

protected $table = 'generalpostlikes';

	 protected $fillable = [
        'user_id',
        'post_id',
        'like',
        
    ];
    public function user(){
    	return $this->belongsTo('\App\User');
    }
    public function generalpostlikes(){
    	return $this->hasMany('\App\GeneralPostLike');
    }
}
