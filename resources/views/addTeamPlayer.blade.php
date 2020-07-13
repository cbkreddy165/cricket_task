<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

		<!-- Bootstrap Core CSS -->
		<link href="{{url('/')}}/public/css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="{{url('/')}}/public/css/landing-page.css" rel="stylesheet">

		<!-- Custom Fonts -->
		<link href="{{url('/')}}/public/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	
		<style>
			.intro-header2 {
				padding-top: 50px;
				padding-bottom: 50px;
				

			}
			.intro-message2{
				margin: 0 auto;
				width: 400px;
				min-height: 400px;
			}
			.intro-message2 h1{
				text-align:center;
			}
			.btnBlue{
				    background: #4e6ab9;
			}
			.plhis{
				padding-bottom: 20px;
				
				display: block;
				font-size: 20px;
			}
		</style>
	
    </head>
    <body>
	
   <!-- Navigation -->
    @include('nav')
	
	
	
    <a name="about"></a>
    <div class="intro-header2">
        <div class="container">

            <div class="row">
                <div class="">
                    <div class="intro-message2">
                        <h1>Add Team Player</h1>
						
						@if ($message = Session::get('success'))

							<div class="alert alert-success alert-block">

								<button type="button" class="close" data-dismiss="alert">×</button>

									<strong>{{ $message }}</strong>

							</div>

						

						@endif
						
						
						<!-- Edit Info -->
						
						@if ($editID == TRUE)
							
							<form action="{{url('/')}}/saveTeamPlayerData" enctype="multipart/form-data" method="post">
								 {{ csrf_field() }}
								 
								<div class="form-group">
									<label for="name">Select Team:</label>
									<select id="teamid" name="teamid" class="form-control">
										<option value="" >Please select Team</option>
										@if (count($teamsList) > 0 )
											
											@foreach ($teamsList as $team)
												@php
													if($team->id == $playerList->team_id)
														$sel = "selected";
													else
														$sel = "";
													
												@endphp
												<option value="{{$team->id}}" <?php echo $sel; ?> >{{$team->name }}</option>
											@endforeach  
										@endif
									</select>
								  </div>	
								 
							  <div class="form-group">
								<label for="name">First Name:</label>
								<input type="text" class="form-control" id="firstName" name="firstName" value="{{$playerList->firstName }}" />
							  </div>
							  <div class="form-group">
								<label for="name">Last Name:</label>
								<input type="text" class="form-control" id="lastName" name="lastName" value="{{$playerList->lastName }}" />
							  </div>
							   <div class=""><img src="{{url('/')}}/public/img/{{$playerList->imageUri}}"></div>
							  <div class="form-group">
								<label for="file">Player Logo:</label>
								<input type="file" class="form-control" id="playerLogo" name="playerLogo" value="" />
							  </div>
							 <div class="form-group">
								<label for="name">Jersey Number:</label>
								<input type="text" class="form-control" id="jersey_number" name="jersey_number" value="{{$playerList->jersey_number }}" />
							  </div>
							  
							  <div class="form-group">
								<label for="name">Country:</label>
								<input type="text" class="form-control" id="country" name="country" value="{{$playerList->country }}" />
							  </div>
							  <span class="plhis">Player History</span>
							  
							  @php
								
								$player_info = unserialize( $playerList->player_history );
								@endphp
							  
							  <div class="form-group">
								<label for="name">Matches:</label>
								<input type="text" class="form-control" id="matches" name="matches" value="{{$player_info['matches']}}" />
							  </div>
							  <div class="form-group">
								<label for="name">Runs:</label>
								<input type="text" class="form-control" id="runs" name="runs" value="{{$player_info['runs']}}" />
							  </div>
							  <div class="form-group">
								<label for="name">Highest scores:</label>
								<input type="text" class="form-control" id="highest_scores" name="highest_scores" value="{{$player_info['highest_scores'] }}" />
							  </div>
							  <div class="form-group">
								<label for="name">Hundreds:</label>
								<input type="text" class="form-control" id="hundreds" name="hundreds" value="{{$player_info['hundreds'] }}" />
							  </div>
							  <div class="form-group">
								<label for="name">Fifties:</label>
								<input type="text" class="form-control" id="fifties" name="fifties" value="{{$player_info['fifties'] }}" />
							  </div>
							  
							  <input type="hidden" class="form-control" id="editid" name="editid" value="{{$editID}}">
							  <button type="submit" class="btn btn-default btnBlue">Update</button>
							</form>
							
							
						@else
							
							<form action="{{url('/')}}/saveTeamPlayerData" enctype="multipart/form-data" method="post">
								 {{ csrf_field() }}
								 
								<div class="form-group">
									<label for="name">Select Team:</label>
									<select id="teamid" name="teamid" class="form-control">
										<option value="" >Please select Team</option>
										@if (count($teamsList) > 0 )
											@foreach ($teamsList as $team)
												<option value="{{$team->id}}">{{$team->name }}</option>
											@endforeach  
										@endif
									</select>
								  </div>	
								 
							  <div class="form-group">
								<label for="name">First Name:</label>
								<input type="text" class="form-control" id="firstName" name="firstName">
							  </div>
							  <div class="form-group">
								<label for="name">Last Name:</label>
								<input type="text" class="form-control" id="lastName" name="lastName">
							  </div>
							  
							  <div class="form-group">
								<label for="file">Player Logo:</label>
								<input type="file" class="form-control" id="playerLogo" name="playerLogo">
							  </div>
							 <div class="form-group">
								<label for="name">Jersey Number:</label>
								<input type="text" class="form-control" id="jersey_number" name="jersey_number">
							  </div>
							  
							  <div class="form-group">
								<label for="name">Country:</label>
								<input type="text" class="form-control" id="country" name="country">
							  </div>
							  <span class="plhis">Player History</span>
							  <div class="form-group">
								<label for="name">Matches:</label>
								<input type="text" class="form-control" id="matches" name="matches">
							  </div>
							  <div class="form-group">
								<label for="name">Runs:</label>
								<input type="text" class="form-control" id="runs" name="runs">
							  </div>
							  <div class="form-group">
								<label for="name">Highest scores:</label>
								<input type="text" class="form-control" id="highest_scores" name="highest_scores">
							  </div>
							  <div class="form-group">
								<label for="name">Hundreds:</label>
								<input type="text" class="form-control" id="hundreds" name="hundreds">
							  </div>
							  <div class="form-group">
								<label for="name">Fifties:</label>
								<input type="text" class="form-control" id="fifties" name="fifties">
							  </div>
							  
							  
							  <button type="submit" class="btn btn-default btnBlue">Submit</button>
							</form>
							
							
						@endif
						
						
						
                    </div>
                </div>
				
				
				
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->
	
	
	 <!-- Footer -->
	  @include('footer')
    

    </body>
</html>
