<?php

namespace App;

use App\Campustopic;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Campuspost extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'campusposts';
    protected $fillable = [
        'body',
        'user_id',
        'topic_id',
        'institution_id',
        'postimage1',
        'postimage2',
        'postimage3',
        'postfile',
    ];

    /**
     * The owner of the post.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('\App\User', 'user_id');
    }

    /**
     * The topic that the belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function topic()
    {
        return $this->belongsTo('\App\Campustopic', 'topic_id');
    }

   public function institution(){
    return $this->belongsTo('\App\Institution', 'institution_id');
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
