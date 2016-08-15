<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * One-to-Many relations with User.
     *
     */
    public function users()
    {
    	//return $this->belongsToMany('App\User');
    	return $this->hasMany('App\User');
    }
}
