<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postdislike extends Model


{

protected $table = 'campuspostdislikes';

	 protected $fillable = [
        'user_id',
        'post_id',
        'dislike',
        
    ];
    public function user(){
    	return $this->belongsTo('\App\User');
    }
    public function campuspostdislikes(){
    	return $this->hasMany('\App\Postdislike');
    }
}
