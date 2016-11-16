<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralTopicLike extends Model


{

protected $table = 'generaltopiclikes';

	 protected $fillable = [
        'user_id',
        'topic_id',
        'like',
        
    ];
    public function user(){
    	return $this->belongsTo('\App\User');
    }
    public function generaltopiclikes(){
    	return $this->hasMany('\App\GeneralTopicLike');
    }
}
