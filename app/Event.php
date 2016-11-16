<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

	protected $table = 'events';
	protected $fillable = [
	'name','details','location','day','month','year','time','slug','eventimage_1','eventimage_2','eventimage_3','eventfile','institution_id'
	];

	public function user(){
		return $this->belongsTo('App\User');
	}

	public function institution(){
		return $this->belongsTo('App\Institution', 'institution_id');
	}
	public function getEventImage(){
	if ($this->eventimage_1){
		return $this->eventimage_1;
	}elseif ($this->eventimage_2) {
		return $this->eventimage_2;
	}elseif ($this->eventimage_3) {
		return $this->eventimage_3;
	}else return 'placeholder.png';
	}
	public function getEventImage2(){
		if($this->eventimage_2){   
		return $this->eventimage_2;
	}
	
}
	public function getEventImage3(){
		if($this->eventimage_3){  
		return $this->eventimage_3;
	}
	 
}
	public function getEventSlug(){
		return $this->slug;
	}
	public function getEventId(){
		return $this->id;
	}
	public function GetEventName(){
		return $this->name;
	}

	public function likes(){
		return $this->morphMany('\App\Like', 'likeable');
	}

	public function shares(){
		return $this->morphMany('\App\Share', 'shareable');
	}

	public function getEventFile(){
		return 'open-file-icon.png';
	}
	
}

	

