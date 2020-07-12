<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Teams extends Model
{
    //
	
	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'logoUri', 'club_state','status',
    ];
}
