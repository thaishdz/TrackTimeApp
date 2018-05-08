<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time_Entries extends Model
{
	protected $fillable = ['start','finish','duration','currently'];

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }

    public $timestamps = false;
}
