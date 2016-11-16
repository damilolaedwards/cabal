<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dislike extends Model


{

protected $table = 'campustopicdislikes';

	 protected $fillable = [
        'user_id',
        'topic_id',
        'dislike',
        
    ];
    public function user(){
    	return $this->belongsTo('\App\User');
    }
    public function dislikes(){
    	return $this->hasMany('\App\Dislike');
    }
}
