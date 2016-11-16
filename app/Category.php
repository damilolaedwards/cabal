<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = 'categories';

	 public function topics()
    {
        return $this->hasMany('\App\GeneralTopic', 'category_id');
    }

}