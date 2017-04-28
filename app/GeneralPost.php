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

    public function linkifyYouTubeURLs($text) {
    $text = preg_replace('~
        # Match non-linked youtube URL in the wild. (Rev:20111012)
        https?://         # Required scheme. Either http or https.
        (?:[0-9A-Z-]+\.)? # Optional subdomain.
        (?:               # Group host alternatives.
          youtu\.be/      # Either youtu.be,
        | youtube\.com    # or youtube.com followed by
          \S*             # Allow anything up to VIDEO_ID,
          [^\w\-\s]       # but char before ID is non-ID char.
        )                 # End host alternatives.
        ([\w\-]{11})      # $1: VIDEO_ID is exactly 11 chars.
        (?=[^\w\-]|$)     # Assert next char is non-ID or EOS.
        [?=&+%\w-]*        # Consume any URL (query) remainder.
        ~ix', 
        '

<iframe width="560" height="315" src="http://www.youtube.com/embed/$1"></iframe>

',
        $text);
    return $text;
}
    
}