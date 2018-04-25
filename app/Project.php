<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name','description','active','companies_id'
    ];

    public $timestamps = false;


    public function company() {

    	return $this->belongsTo('App\Companies');
    }

    public function tasks() {

    	return $this->hasMany('App\Task');
    }

}
