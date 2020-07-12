<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Points extends Model
{
    //
	protected $fillable = [
        'match_id', 'points', 'status',
    ];
}
