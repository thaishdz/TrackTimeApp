<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name','description','estimated_minute','active','projects_id','time_id'
    ];

    public $timestamps = false;

    public function project() {

    	return $this->belongsTo('App\Project');
    }

    public function time__entries(){

    	return $this->belongsTo('App\Time_Entries');
    }
}
