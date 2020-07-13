<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teams;
use App\Players;
use App\Points;
use App\Matches;

use DB;
use Validator;
use Session;


class Home extends Controller
{
    //Get Team List
	
	public function index(){
		
		$data["teamsList"] = Teams::where("status","=",1)->orderBy("id","ASC")->paginate(2);
		
		// Get Point info
		//SELECT p.team_id,t.name,sum(p.points) as points, count(p.match_id) as matches, (select count(1) from matches WHERE winner_team=p.team_id) as winner,(select count(1) from matches WHERE lost_team=p.team_id) as lost FROM points p join teams t on p.team_id=t.id group by p.team_id, t.name
		$pointsquery = "SELECT p.team_id,t.name,t.logoUri,sum(p.points) as points, count(p.match_id) as matches, (select count(1) from matches WHERE winner_team=p.team_id) as winner,(select count(1) from matches WHERE lost_team=p.team_id) as lost FROM points p join teams t on p.team_id=t.id group by p.team_id, t.name,t.logoUri";
        $data["points"] = DB::select(DB::raw($pointsquery));
        
		return view('welcome')->with($data);
		
	}
	
	// Add Team
	
	public function addTeam(Request $request){
		
		$data["editID"] = false;
		return view('addTeam')->with($data);
		
	}
	
	// Save Team Data
	
	public function saveTeamData(Request $request){
		
		$validator = Validator::make($request->all(), [
						"teamName"    => "required",
						"teamLogo"  => 'required',
					]);
		
		if($validator->fails()){  
			
			return back()->with('success',$validator->getMessageBag());
		}else {
			
			$teamName = $request->input("teamName");
			$teamLogo = $request->file("teamLogo");
			$editid = $request->input("editid");
			
			// update team data
			if(!empty($editid)){
				
				
				if(!empty($teamLogo)){
				
					// move team logo images folder
					$image = time().'.'.$teamLogo->getClientOriginalExtension();
					$path = public_path('img/');
					//echo $path.$image;die;
					$teamLogo->move($path, $image);
					
					// update teams table
					
					$data = array("name"=>$teamName,"logoUri"=>$image,"club_state"=>1,"status"=>1);
					$upda_data = Teams::where('id', $editid)->update($data);
					
					return back()->with('success','You have successfully updated team data.');

					
				}else{
					
					return back()->with('success','Something went wrong');
				}
				
				
			}else{
				
				// insert team Data
				
				if(!empty($teamLogo)){
				
					// move team logo images folder
					$image = time().'.'.$teamLogo->getClientOriginalExtension();
					$path = public_path('img/');
					//echo $path.$image;die;
					$teamLogo->move($path, $image);
					
					// Save teams table
					
					$data = array("name"=>$teamName,"logoUri"=>$image,"club_state"=>1,"status"=>1);
					$inserted_data = Teams::insert($data);
					
					return back()->with('success','You have successfully added team.');

					
				}else{
					
					return back()->with('success','Something went wrong');
				}
				
				
			}
			
			
		
			
		}
	
		
	}
	
	
	
	// Delete Team List
	
	public function deleteTeam(Request $request){
		
		$id = $request->input("id");
		if(!empty($id)){
			
			$res = Teams::where('id', $id)->delete();
			
			if($res == TRUE){
				echo 1;
				
			}else{
				echo 2;
			}
		}else{
			echo 3;
		}
		
	}
	
	
	// Edit Team info
	
	public function editTeam(Request $request,$id){
		
		$team_id =  $id; //$request->input('id');
		//echo $team_id;exit;
		$data["teamsList"] = Teams::where("status","=",1)->where("id","=",$team_id)->first();
		$data["editID"] = $team_id;
		
		return view('addTeam')->with($data);
		
	}
	
	
	
	
	// Get Team Members List
	public function getTeamMembers(Request $request,$id){
		
		$team_id =  $id; //$request->input('id');
		//echo $team_id;exit;
		$data["teamsList"] = Teams::where("status","=",1)->where("id","=",$team_id)->first();
		$data["teamsDetails"] = Players::where("status","=",1)->where("team_id","=",$team_id)->paginate(2);
		
		return view('teamDetails')->with($data);
		
	}
	
	
	// Team Players form
	public function addTeamPlayer(Request $request){ 
		
		$data["editID"] = false;
		$data["teamsList"] = Teams::where("status","=",1)->get();
		return view('addTeamPlayer')->with($data);
		
	}
	
	
	// Save Team player Data
	public function saveTeamPlayerData(Request $request){
		
		$validator = Validator::make($request->all(), [
						"teamid"    => "required",
						"firstName"    => "required",
						"lastName"    => "required",
						"jersey_number"    => "required",
						"country"    => "required",
						"playerLogo"  => 'required',
						"matches"    => "required",
						"runs"    => "required",
						"highest_scores"    => "required",
						"hundreds"    => "required",
						"fifties"    => "required",
					]);
		
		if($validator->fails()){  
			
			return back()->with('success',$validator->getMessageBag());
		}else {
			
			$teamid = $request->input("teamid");
			$firstName = $request->input("firstName");
			$lastName = $request->input("lastName");
			$jersey_number = $request->input("jersey_number");
			$country = $request->input("country");
			$matches = $request->input("matches");
			$runs = $request->input("runs");
			$highest_scores = $request->input("highest_scores");
			$hundreds = $request->input("hundreds");
			$fifties = $request->input("fifties");
			$playerLogo = $request->file("playerLogo");
			
			$editid = $request->input("editid");
			
			// update team data
			if(!empty($editid)){
				
				
				if(!empty($playerLogo)){
				
					// move team logo images folder
					$image = time().'.'.$playerLogo->getClientOriginalExtension();
					$path = public_path('img/');
					//echo $path.$image;die;
					$playerLogo->move($path, $image);
					
					
					// convert serialize array
					
					$player_history = array(
										"matches"=>$matches,
										"runs"=>$runs,
										"highest_scores"=>$highest_scores,
										"hundreds"=>$hundreds,
										"fifties"=>$fifties
										);
					
					// update teams table
					
					
					$data = array(
								"team_id"=>$teamid,
								"firstName"=>$firstName,
								"lastName"=>$lastName,
								"imageUri"=>$image,
								"jersey_number"=>$jersey_number,
								"country"=>$country,
								"player_history"=>serialize($player_history),
								
								
								);
					$upda_data = Players::where('id', $editid)->update($data);
					
					return back()->with('success','You have successfully updated team player data.');

					
				}else{
					
					return back()->with('success','Something went wrong');
				}
				
				
			}else{
				
				// insert team Data
				
				if(!empty($playerLogo)){
				
					// move team logo images folder
					$image = time().'.'.$playerLogo->getClientOriginalExtension();
					$path = public_path('img/');
					//echo $path.$image;die;
					$playerLogo->move($path, $image);
					
					// convert serialize array
					
					$player_history = array(
										"matches"=>$matches,
										"runs"=>$runs,
										"highest_scores"=>$highest_scores,
										"hundreds"=>$hundreds,
										"fifties"=>$fifties
										);
					// Save Players table
					
					$data = array(
								"team_id"=>$teamid,
								"firstName"=>$firstName,
								"lastName"=>$lastName,
								"imageUri"=>$image,
								"jersey_number"=>$jersey_number,
								"country"=>$country,
								"player_history"=>serialize($player_history),
								
								
								);
					
					$inserted_data = Players::insert($data);
					
					return back()->with('success','You have successfully added Player Info.');

					
				}else{
					
					return back()->with('success','Something went wrong');
				}
				
				
			}
			
			
		
			
		}
	
		
	}
	
	
	// Edit Team player info
	
	public function editTeamPlayer(Request $request,$id){
		
		$player_id =  $id; //$request->input('id');
		//echo $team_id;exit;
		$data["teamsList"] = Teams::where("status","=",1)->get();
		$data["playerList"] = Players::where("status","=",1)->where("id","=",$player_id)->first();
		$data["editID"] = $player_id;
		
		return view('addTeamPlayer')->with($data);
		
	}
	
	// Delete Team player
	
	public function deleteTeamPlayer(Request $request){
		
		$id = $request->input("id");
		if(!empty($id)){
			
			$res = Players::where('id', $id)->delete();
			
			if($res == TRUE){
				echo 1;
				
			}else{
				echo 2;
			}
		}else{
			echo 3;
		}
		
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
