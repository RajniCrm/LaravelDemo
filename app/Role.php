<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $fillable = [
        'id','title1','status', 'role_id',
    ];

    // A SINGLE ROLE HAS MANY USERS
    public function user()
    {
    	return $this->hasMany('App\User','id', 'role_id');
    }
}
