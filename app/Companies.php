<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
	public function project() {

    	return $this->hasMany('App\Project');
    }

    public function users() {

    	return $this->hasMany('App\User');
    }
}
