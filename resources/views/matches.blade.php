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
			.match1{
				float:left;
			}
			.matt h1{
				margin-bottom:30px;
			}
			.mat{
				border-right:1px solid #2d2c2c;
			}
			
			.mat h4{
				font-size:16px;
				
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
                    <div class="intro-message2 matt">
                        <h1>IPL Matches List</h1>
						
						@if (count($matchesList) > 0 )
							@foreach ($matchesList as $match)
						
								<div class="col-md-4">
									<div class="mat">
										<div class="match1">
											<img src="{{url('/')}}/public/img/{{ $match['matchFromImg'] }}" alt="" class="teamsimg" />
											<h4>{{$match['matchFrom'] }}</h4>
										</div>
										
										<div class="match2">
											<img src="{{url('/')}}/public/img/{{ $match['matchToImg'] }}" alt="" class="teamsimg" />
											<h4>{{$match['matchTo'] }}</h4>
										</div>
										<span>Live : {{$match['matchStartDate'] }} IST</span>
									</div>
								</div>
							@endforeach
						@else
							<div class="col-md-4">
								<div class="">No Matches not strat Yet</div>	
							</div>
						@endif
						<!--
						<div class="col-md-4">
						
							<div class="match1">
								<img src="{{url('/')}}/public/img/mumbai.jpg" alt="" class="teamsimg" />
								<h4>Mumbai Indians</h4>
							</div>
							
							<div class="match2">
								<img src="{{url('/')}}/public/img/chennai.png" alt="" class="teamsimg" />
								<h4>Chennai Super Kings</h4>
							</div>
							<span>Live : July 11 2020 19:15 IST</span>
						</div>
						<div class="col-md-4">
						
							<div class="match1">
								<img src="{{url('/')}}/public/img/mumbai.jpg" alt="" class="teamsimg" />
								<h4>Mumbai Indians</h4>
							</div>
							
							<div class="match2">
								<img src="{{url('/')}}/public/img/chennai.png" alt="" class="teamsimg" />
								<h4>Chennai Super Kings</h4>
							</div>
							<span>Live : July 11 2020 19:15 IST</span>
						</div>
						-->
                         
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
