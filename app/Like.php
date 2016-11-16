<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model


{

protected $table = 'likes';

	 protected $fillable = [
        'user_id',
        'topic_id',
        'like',
        
    ];
    public function user(){
    	return $this->belongsTo('\App\User');
    }
    public function likes(){
    	return $this->hasMany('\App\Like');
    }
}
