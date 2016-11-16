<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralTopic extends Model
{
	protected $table = 'generaltopics';

	 protected $fillable = [
        'title',
        'slug',
        'body',
        'user_id',
        'category_id',
        'forumimage1',
        'forumimage2',
        'forumimage3',
        'forumfile',
    ];
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
        return $this->hasMany('\App\GeneralPost', 'topic_id');
    }


    public function category(){
        return $this->belongsTo('\App\Category', 'category_id');
    }
    public function getTopicSlug(){
        return $this->slug;
    }
    public function getTopicId(){
        return $this->id;
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
}