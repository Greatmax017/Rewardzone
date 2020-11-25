

<?php $__env->startSection('content'); ?>

	<!-- Inner Page Header serction start here -->
	<div class="inner-page-header">
		<div class="container">
			<div class="row">
				 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					 <div class="header-page-title">
						 <h3 style="margin-bottom:7px; color:white;"><?php echo e($post->title); ?> </h3>
						 <small style="margin-bottom:10px; color:white;"><b>Created <?php echo e($post->created_at->diffForHumans()); ?></b></small>
					 </div>
				 </div>
				 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					 <div class="header-page-locator">
						 <ul>
							 <li><a href="/">Home /</a> <a href="#">Blog /</a> Article</li>
						 </ul>
					 </div>
				 </div>
			</div>
		</div>
	</div>
	<!-- Inner Page Header serction end here -->

	    <!--Organisations-->
	      <div class="container">
    		<div class="row">
    		  <div class="col-md-10 col-md-offset-1">
    			<div class="detail-info">
    				<?php echo $post->content; ?>

					<br><br>
    		    </div>
    	      </div>
    		</div>
	      </div>
	    <!--/ Organisations-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>