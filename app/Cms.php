<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cms extends Model
{
    //
    protected $fillable = [
        'title','parent_id','slug','position','description','status','image',
    ];
}
