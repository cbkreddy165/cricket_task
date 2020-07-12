<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teams;
use App\Players;
use App\Points;
use App\Matches;

use DB;

class Home extends Controller
{
    //Get Team List
	
	public function index(){
		
		$data["teamsList"] = Teams::where("status","=",1)->get();
		
		// Get Point info
		//SELECT p.team_id,t.name,sum(p.points) as points, count(p.match_id) as matches, (select count(1) from matches WHERE winner_team=p.team_id) as winner,(select count(1) from matches WHERE lost_team=p.team_id) as lost FROM points p join teams t on p.team_id=t.id group by p.team_id, t.name
		$pointsquery = "SELECT p.team_id,t.name,t.logoUri,sum(p.points) as points, count(p.match_id) as matches, (select count(1) from matches WHERE winner_team=p.team_id) as winner,(select count(1) from matches WHERE lost_team=p.team_id) as lost FROM points p join teams t on p.team_id=t.id group by p.team_id, t.name,t.logoUri";
        $data["points"] = DB::select(DB::raw($pointsquery));
        
		return view('welcome')->with($data);
		
	}
	
	// Get Team Members List
	public function getTeamMembers(Request $request,$id){
		
		$team_id =  $id; //$request->input('id');
		//echo $team_id;exit;
		$data["teamsList"] = Teams::where("status","=",1)->where("id","=",$team_id)->first();
		$data["teamsDetails"] = Players::where("status","=",1)->where("team_id","=",$team_id)->get();
		
		return view('teamDetails')->with($data);
		
	}
	
	
	// Get Matches List
	public function matches(Request $request){
		
		
		$matchesList = Matches::where("status","=",1)->get();
		$matchesData= array();
		if( count($matchesList) > 0 ){
			foreach($matchesList as $match){
				$match_between = $match->match_between;
				$matchName = explode("-",$match_between);
				$team1 = $matchName[0];
				$team2 = $matchName[1];
				
				$team1_info = Teams::where("status","=",1)->where("id","=",$team1)->first();
				$team2_info = Teams::where("status","=",1)->where("id","=",$team2)->first();
				
				$winner_team = $match->winner_team;
				$lost_team = $match->lost_team;
				$match_start_at = date("d-m-Y H:i:s",strtotime($match->match_start_date));
				
				$matchesData[] = array(
									"matchFrom"=>$team1_info->name,
									"matchFromImg"=>$team1_info->logoUri,
									"matchTo"=>$team2_info->name,
									"matchToImg"=>$team2_info->logoUri,
									"matchStartDate"=>$match_start_at,
									
								);
				
				
				
			}
			
			$data["matchesList"] = $matchesData;
		}else{
			
			$data["matchesList"] = array();
		}
		
		
		return view('matches')->with($data);
		
	}
	
}
