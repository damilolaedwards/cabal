<?php

namespace App;

use App\Campuspost;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Campustopic extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'body',
        'user_id',
        'institution_id',
        'forumimage1',
        'forumimage2',
        'forumimage3',
        'forumfile',
    ];



    protected $table = 'campustopics';
    /**
     * Fetch the most recently created topics.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLatestFirst($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    /**
     * Get the user that owns the topic.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('\App\User');
    }

    /**
     * The posts that belong to a topic.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function posts()
    {
        return $this->hasMany('\App\Campuspost', 'topic_id');
    }


    public function institution(){
        return $this->belongsTo('\App\Institution');
    }

    public function getTopicSlug(){
        return $this->slug;
    }
    public function getTopicId(){
        return $this->id;
    }

    public function likes(){
        return $this->hasMany('\App\Like');
    }

    
    public function getFirstImage(){
        if ($this->forumimage1);
        return $this->forumimage1;
    }

    public function getSecondImage(){
        if ($this->forumimage2);
        return $this->forumimage2;
    }

    public function getThirdImage(){
        if ($this->forumimage3);
        return $this->forumimage3;
    }

     public function getTopicFile(){
        return 'open-file-icon.png';
    }

    public function getCloseThread(){
        return 'closedthread.gif';
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