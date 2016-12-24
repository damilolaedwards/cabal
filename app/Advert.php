<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{

	protected $table = 'adverts';
	protected $fillable = [
	'title','description','price','negotiable','phone_number','advertimage1','advertimage2','advertimage3','advertfile','institution_id','slug',
	];

	public function user(){
		return $this->belongsTo('App\User');
	}

	public function getAdvertImage(){
	if ($this->advertimage1){
		return $this->advertimage1;
	}elseif ($this->advertimage2) {
		return $this->advertimage2;
	}elseif ($this->advertimage3) {
		return $this->advertimage3;
	}else return 'placeholder.jpg';
	}
	 
	public function getAdvertImage2(){
		if($this->advertimage2){
			return $this->advertimage2;
		}
	}
	public function getAdvertImage3(){
		if($this->advertimage3){
			return $this->advertimage3;
		}
	}
	public function getAdvertDescription(){
		if($this->description){  
		return $this->description;
	}
	return "No description Available";
	}
	public function getAdvertTitle(){
		return $this->title;
	}
	public function getAdvertId(){
		return $this->id;
	}
	public function likes(){
		return $this->morphMany('\App\Like', 'likeable');
	}
	public function getAdvertFile(){
		
			return 'open-file-icon.png';
	}
}




 