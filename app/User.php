<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;
   /*
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'password', 'profile_image', 'sex','status','personal_text','username','day','month','year','institution_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    
 public function institution()
    {
        return $this->belongsTo('App\Institution','institution_id');
    }

    public function adverts(){
  return $this->hasMany('App\Advert', 'user_id');
}

    public function getName(){
        if ($this->username){
            return $this->username;
        }
        return null;
    }
    public function getInstitutionId(){
if ($this->institution_id){
    return $this->institution_id;
}
return null;
    }
   
public function getUserId(){
  return $this->id;
}
 public function getUsername(){
    return $this->getName();
 }
  public function getUserProfileImage(){
    if ($this->profile_image){
        return $this->profile_image;
    }
    return "https://www.gravatar.com/avatar/{{md5($this->email)}}?d=mm&s=160";
 }
 public function getProfileImage(){
    if ($this->profile_image){
        return $this->profile_image;
    }
    return "https://www.gravatar.com/avatar/{{md5($this->email)}}?d=mm&s=40";
 }
 public function friendsOfMine(){
    return $this->belongsToMany('\App\User', 'friends', 'user_id','friend_id');
 }
 public function friendOf(){
    return $this->belongsToMany('\App\User', 'friends', 'friend_id','user_id');
 }
 public function friends(){
    return $this->friendsOfMine()->wherePivot('accepted',true)->paginate(2)->merge($this->friendOf()->wherePivot('accepted', true)->paginate(2));
}
 public function friendRequests(){
    return $this->friendsOfMine()->wherePivot('accepted',false)->paginate(20);
 }
 public function friendRequestsPending(){
   return $this->friendOf()->wherePivot('accepted', false)->get();
 }
 public function hasFriendRequestRecieved(User $user){
  return (bool) $this->friendRequests()->where('id', $user->id)->count();
 }
 public function hasFriendRequestsPending(User $user){
    return (bool) $this->friendRequestsPending()->where('id', $user->id)->count();
 }
 public function addFriend(User $user){
    $this->friendOf()->attach($user->id);
 }
  public function deleteFriend(User $user){
    $this->friendOf()->detach($user->id);
     $this->friendsOfMine()->detach($user->id);
 }
 public function acceptFriendRequest(User $user){
    $this->friendRequests()->where('id',$user->id)->first()->pivot->update([
        'accepted' => true,
        ]);
 }
 public function isFriendsWith(User $user){
    return (bool) $this->friends()->where('id', $user->id)->count();
 }

    public function messages(){
    return $this->hasMany('\App\Message', 'sender_id');
  }

  public function sent_messages(){
    return $this->hasMany('\App\Message', 'reciever_id');
  }

  public function events(){
    return $this->hasMany('\App\Event', 'user_id');
  }

  public function campustopics(){
    return $this->hasMany('\App\Campustopic','user_id');
  }

  public function personaltext(){
    return (bool) $this->personal_text;
  }
  public function campusposts(){
    return $this->hasMany('\App\Campuspost', 'user_id');
  }
 
  
  public function likes(){
    return $this->hasMany('\App\Like', 'user_id');
  }

  public function eventlikes(){
    return $this->hasMany('\App\Eventlike', 'user_id');
  }

  public function eventgoings(){
    return $this->hasMany('\App\Eventgoing', 'user_id');
  }

  public function advertlikes(){
      return $this->hasMany('\App\Advertlike', 'user_id');
    }

    public function dislikes(){
      return $this->hasMany('\App\Dislike', 'user_id');
    }

    public function campuspostlikes(){
      return $this->hasMany('\App\Postlike', 'user_id');
    }

     public function campuspostdislikes(){
      return $this->hasMany('\App\Postdislike','user_id');
    }

    public function generaltopiclikes(){
      return $this->hasMany('\App\GeneralTopicLike','user_id');
    }

    public function generaltopicdislikes(){
      return $this->hasMany('\App\GeneralTopicDislike', 'user_id');
    }

    public function generalpostlikes(){
      return $this->hasMany('\App\GeneralPostLike', 'user_id');
    }

    public function generalpostdislikes(){
      return $this->hasMany('\App\GeneralPostDislike', 'user_id');
    }
    public function generaltopics(){
    return $this->hasMany('\App\GeneralTopic','user_id');
  }
   public function generalposts(){
    return $this->hasMany('\App\GeneralPost','user_id');
  }
  
}
