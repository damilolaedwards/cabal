<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Message extends Model
{

	protected $table = 'messages';
	protected $fillable = [
	'body','sender_id','reciever_id', 'file', 'image'
	];

	public function from(){
		return $this->belongsTo('\App\User', 'sender_id');
	}

	public function to(){
		return $this->belongsTo('App\User', 'reciever_id');
	}
	public function getMessageImage(){
		if($this->image)
			return $this->image;
	}

	public function getMessageFile(){
		return 'open-file-icon.png';
	}
	
  
}




 