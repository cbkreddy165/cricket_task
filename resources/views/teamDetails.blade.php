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
			.teamsimg{
				width:100px !important;
				height:100px !important;
			}
			.table tr td {
				vertical-align: middle !important;
				font-size:18px;
			}
			.viewmore{
				    background: #0a7fc3;
					padding: 10px;
					border-radius: 5px;
					color: #fff;
			}
			.viewmore:hover{
				color:#fff;
				text-decoration:none;
			}
			.teamde{
				    margin-top: 10px;
			}
			.teamde img{
				width:100px;
			}
			.backbtn{
				text-align: left;
				margin-top: 20px;
			}
			.backbtn a{
				background: #4d96b9;
				padding: 10px 20px;
				color: #fff;
				border-radius: 5px;
			}
			.player_info{
				width: 50%;
				float: left;
				font-size: 22px;
			}
		</style>
	
    </head>
    <body>
      
		
	<!-- Navigation -->
	@include('nav')
    
	
	
    <a name="about"></a>
    <div class="intro-header">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
					<div class="backbtn"><a href="{{ url('/') }} " class="" >BACK</a></div>
                    <div class="intro-message2 teamde"> 
						<img src="{{url('/')}}/public/img/{{$teamsList->logoUri }}" alt="" />
                        <h1>{{ $teamsList->name}}</h1>
					</div>
					
					<table class="table table-bordered">
						@if (count($teamsDetails) > 0 )
							@php
								$i = 1
							@endphp
							@foreach ($teamsDetails as $team)
							
							  <tr>
								<td>{{ $i }}</td>
								<td><img src="{{url('/')}}/public/img/{{$team->imageUri }}" alt="" class="teamsimg" /></td>
								<td>{{$team->firstName." ".$team->lastName }}</td>
								<td>{{$team->jersey_number }}</td>
								<td>{{$team->country }}</td>
								<td><a id="myModal{{$team->id }}" class="myModal viewmore" data-id="{{$team->id }}"  href="javascript:void(0)" >Player History</a></td>
							  </tr>
							  
							@php
								$i++;
								$player_info = unserialize( $team->player_history );
							@endphp
							
							<div id="myModal{{$team->id }}" class="modal fade" tabindex="-1">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h2 class="modal-title player_info">Player Info</h2>
											<button type="button" class="close" data-dismiss="modal">&times;</button>
										</div>
										<div class="modal-body">
											<div class=""><span>Matches :{{ $player_info['matches'] }}</span></div>
											<div class=""><span>runs :{{ $player_info['runs'] }}</span></div>
											<div class=""><span>hundreds :{{ $player_info['hundreds'] }}</span></div>
											<div class=""><span>fifties :{{ $player_info['fifties'] }}</span></div>
											<div class=""><span>highest_scores :{{ $player_info['highest_scores'] }}</span></div>
										</div>
									   
									</div>
								</div>
							</div>
							
							
							
							@endforeach  
						@else
								
						  <tr>
							<td colspan="4">Not Found </td>
						  </tr>
						@endif
					</table>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->
	

	
	 <!-- Footer -->
	 @include('footer')
   
	<script>
		$(document).ready(function(){
			$(".myModal").click(function(){
				var id = $(this).attr("data-id");
				$("#myModal"+id).modal('show');
			});
		});
	</script>
    </body>
</html>
