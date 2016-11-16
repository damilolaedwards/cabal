<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
     public function user()
    {
        return $this->hasMany('App\User');
    }

    public function getInstitutionId(){
    	$institution_id = Auth::user()->institution_id;
    		return $this->name;
    }
    public function event(){
    	return $this->hasMany('\App\Event','institution_id');
    }
    public function campustopic(){
        return $this->hasMany('\App\Campustopic','institution_id');
    }
    public function campuspost(){
        return $this->hasMany('\App\Campuspost','institution_id');
    }
}



