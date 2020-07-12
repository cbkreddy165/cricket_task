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
		</style>
	
    </head>
    <body>
	
   <!-- Navigation -->
    <?php echo $__env->make('nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	
	
	
    <a name="about"></a>
    <div class="intro-header">
        <div class="container">

            <div class="row">
                <div class="col-lg-8">
                    <div class="intro-message2">
                        <h1>IPL Teams List</h1>
                         <table class="table table-bordered">
							<?php if(count($teamsList) > 0 ): ?>
								<?php
									$i = 1
								?>
								<?php $__currentLoopData = $teamsList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								  <tr>
									<td><?php echo e($i); ?></td>
									<td><img src="<?php echo e(url('/')); ?>/public/img/<?php echo e($team->logoUri); ?>" alt="" class="teamsimg" /></td>
									<td><?php echo e($team->name); ?></td>
									<td><a href="<?php echo e(url('/')); ?>/teamInfo/<?php echo e($team->id); ?>" class="viewmore">View Team Members</a></td>
								  </tr>
								  <?php
									$i++
								?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
							<?php else: ?>
									
							  <tr>
								<td colspan="4">Not Found any Teams</td>
							  </tr>
							<?php endif; ?>
							
							
						  </table>
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
							<?php if(count($points) > 0 ): ?>
								<?php $__currentLoopData = $points; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $point): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									
									<td><img src="<?php echo e(url('/')); ?>/public/img/<?php echo e($point->logoUri); ?>" alt="" class="teamsimg2" width="30" height="30" /><?php echo e($point->name); ?></td>
									<td><?php echo e($point->matches); ?></td>
									<td><?php echo e($point->winner); ?></td>
									<td><?php echo e($point->lost); ?></td>
									<td><?php echo e($point->points); ?></td>
								 </tr>
								 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							 <?php else: ?>
									
							  <tr>
								<td colspan="5">No Points</td>
							  </tr>
							<?php endif; ?>
							 
							 
							
							
						  </table>
                    </div>
				
				</div>
				
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->
	
	
	 <!-- Footer -->
	  <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
	
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\cricket\resources\views/welcome.blade.php ENDPATH**/ ?>