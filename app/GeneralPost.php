<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralPost extends Model
{
	protected $table = 'generalposts';

	 protected $fillable = [
        'body',
        'user_id',
        'topic_id',
        'category_id',
        'postimage1',
        'postimage2',
        'postimage3',
        'postfile',
    ];

    public function user()
    {
        return $this->belongsTo('\App\User', 'user_id');
    }

    public function topic()
    {
        return $this->belongsTo('\App\GeneralTopic', 'topic_id');

    }

     
   public function likes(){
        return $this->morphMany('\App\Like', 'likeable');
    }
    

     public function shares(){
        return $this->morphMany('\App\Share', 'shareable');
    }

    public function getFirstImage(){
        if($this->postimage1)
            return $this->postimage1;
    }

    public function getSecondImage(){
        if($this->postimage2)
            return $this->postimage2;
    }

     public function getThirdImage(){
        if($this->postimage3)
            return $this->postimage3;
    }

     public function getPostFile(){
        return 'open-file-icon.png';
    }
    
}