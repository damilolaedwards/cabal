<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postlike extends Model


{

protected $table = 'campuspostlikes';

	 protected $fillable = [
        'user_id',
        'post_id',
        'like',
        
    ];
    public function user(){
    	return $this->belongsTo('\App\User');
    }
    public function campuspostlikes(){
    	return $this->hasMany('\App\Postlike');
    }
}
