<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

		<!-- Bootstrap Core CSS -->
		<link href="<?php echo e(url('/')); ?>/public/css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="<?php echo e(url('/')); ?>/public/css/landing-page.css" rel="stylesheet">

		<!-- Custom Fonts -->
		<link href="<?php echo e(url('/')); ?>/public/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
	<?php echo $__env->make('nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
	
	
    <a name="about"></a>
    <div class="intro-header">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
					<div class="backbtn"><a href="<?php echo e(url('/')); ?> " class="" >BACK</a></div>
                    <div class="intro-message2 teamde"> 
						<img src="<?php echo e(url('/')); ?>/public/img/<?php echo e($teamsList->logoUri); ?>" alt="" />
                        <h1><?php echo e($teamsList->name); ?></h1>
					</div>
					
					<table class="table table-bordered">
						<?php if(count($teamsDetails) > 0 ): ?>
							<?php
								$i = 1
							?>
							<?php $__currentLoopData = $teamsDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							
							  <tr>
								<td><?php echo e($i); ?></td>
								<td><img src="<?php echo e(url('/')); ?>/public/img/<?php echo e($team->imageUri); ?>" alt="" class="teamsimg" /></td>
								<td><?php echo e($team->firstName." ".$team->lastName); ?></td>
								<td><?php echo e($team->jersey_number); ?></td>
								<td><?php echo e($team->country); ?></td>
								<td><a id="myModal<?php echo e($team->id); ?>" class="myModal viewmore" data-id="<?php echo e($team->id); ?>"  href="javascript:void(0)" >Player History</a></td>
							  </tr>
							  
							<?php
								$i++;
								$player_info = unserialize( $team->player_history );
							?>
							
							<div id="myModal<?php echo e($team->id); ?>" class="modal fade" tabindex="-1">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h2 class="modal-title player_info">Player Info</h2>
											<button type="button" class="close" data-dismiss="modal">&times;</button>
										</div>
										<div class="modal-body">
											<div class=""><span>Matches :<?php echo e($player_info['matches']); ?></span></div>
											<div class=""><span>runs :<?php echo e($player_info['runs']); ?></span></div>
											<div class=""><span>hundreds :<?php echo e($player_info['hundreds']); ?></span></div>
											<div class=""><span>fifties :<?php echo e($player_info['fifties']); ?></span></div>
											<div class=""><span>highest_scores :<?php echo e($player_info['highest_scores']); ?></span></div>
										</div>
									   
									</div>
								</div>
							</div>
							
							
							
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
						<?php else: ?>
								
						  <tr>
							<td colspan="4">Not Found </td>
						  </tr>
						<?php endif; ?>
					</table>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->
	

	
	 <!-- Footer -->
	 <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   
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
<?php /**PATH C:\xampp\htdocs\cricket\resources\views/teamDetails.blade.php ENDPATH**/ ?>