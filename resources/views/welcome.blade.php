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
			.viewmore2{
				    background: #a08a1b;
					padding: 10px;
					border-radius: 5px;
					color: #fff;
			}
			.viewmore2:hover{
				color:#fff;
				text-decoration:none;
			}
			.viewmore3{
				    background: #a08a1b;
					padding: 10px;
					border-radius: 5px;
					color: #fff;
			}
			.viewmore3:hover{
				color:#fff;
				text-decoration:none;
			}
			.addteam{
				display: block;
				margin-bottom: 20px;
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
                <div class="col-lg-8">
                    <div class="intro-message2">
                        <h1>IPL Teams List</h1>
						<span class="text-right addteam"><a href="{{url('/')}}/addTeam" class="viewmore">Add Team</a></span>
						
						@if (count($teamsList) > 0 )
							<table class="table table-bordered">
							
								@php
									$i = 1
								@endphp
								@foreach ($teamsList as $team)
								  <tr>
									<td>{{ $i }}</td>
									<td><img src="{{url('/')}}/public/img/{{$team->logoUri }}" alt="" class="teamsimg" /></td>
									<td>{{$team->name }}</td>
									<td><a href="{{url('/')}}/teamInfo/{{$team->id }}" class="viewmore">View Team Members</a></td>
									<td>
										<a href="{{url('/')}}/editTeam/{{$team->id }}" class="viewmore2">EDIT</a> 
										<a href="#" data-id="{{$team->id }}" onclick="deleteTeam({{$team->id }})" class="viewmore3">DELETE</a>
									</td>
								  </tr>
								  @php
									$i++
								@endphp
								@endforeach  
						
							</table>
						@else
							<table class="table table-bordered">	
							  <tr>
								<td colspan="5">Not Found any Teams</td>
							  </tr>
							</table>
						@endif
						
						{{ $teamsList->links() }}
                    </div>
                </div>
				
				<div class="col-md-4">
					<div class="intro-message2">
                        <h1>Points</h1>
                         <table class="table table-bordered">
						 
							<tr>
								<th>Teams</th> 
								<th>M</th>
								<th>W</th>
								<th>L</th>
								<th>Pts</th>
							</tr>
							@if (count($points) > 0 )
								@foreach ($points as $point)
								<tr>
									
									<td><img src="{{url('/')}}/public/img/{{$point->logoUri}}" alt="" class="teamsimg2" width="30" height="30" />{{ $point->name }}</td>
									<td>{{ $point->matches }}</td>
									<td>{{ $point->winner }}</td>
									<td>{{ $point->lost }}</td>
									<td>{{ $point->points }}</td>
								 </tr>
								 @endforeach
							 @else
									
							  <tr>
								<td colspan="5">No Points</td>
							  </tr>
							@endif
							 
							 
							
							
						  </table>
                    </div>
				
				</div>
				
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->
	
	
	 <!-- Footer -->
	  @include('footer')
    
<script type="text/javascript">
    function deleteTeam(id)
    {
        if(id !=""){
				
			var csrf_token= "<?php echo csrf_token();?>";	
             var r = confirm("Are you sure you want to delete Team");
             if(r ==true){
                 $.ajax({
                    url: "<?php echo url('/');?>/deleteTeam",
                    type: "post",
                    data: {id : id,'_token':csrf_token,'action':'deleteTeam'},
                    success: function (response) {
                       if(response == 1){
                           alert("deleted Successfully");
                           
                           window.location.reload();
                       }else if(response == 3){
                           alert("deleted record id missing");
                           
                           return false;
                       }else{
                            alert("deleted Failed something went wrong in query");
                            return false;
                       }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                       console.log(textStatus, errorThrown);
                    }
                });
                 //window.location.href = 'delete.php?id='+delId;
             }else{
                 
             }
         }else{
			 
			 alert("deleted record id missing");
			  return false;
		 }
    }
    
   
</script>
    </body>
</html>
