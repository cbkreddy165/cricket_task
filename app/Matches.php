<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Matches extends Model
{
    //
	
	protected $fillable = [
        'match_between', 'winner_team', 'lost_team','status',
    ];
}
