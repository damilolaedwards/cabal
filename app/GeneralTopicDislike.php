<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralTopicDislike extends Model


{

protected $table = 'generaltopicdislikes';

	 protected $fillable = [
        'user_id',
        'topic_id',
        'dislike',
        
    ];
    public function user(){
    	return $this->belongsTo('\App\User');
    }
    public function generaltopicdislikes(){
    	return $this->hasMany('\App\GeneralTopicDislike');
    }
}
