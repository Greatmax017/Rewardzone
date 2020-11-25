

<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('sections.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	    <!--Organisations-->
	    <section id ="organisations" class="section-padding">
	      <div class="container">
    		<div class="row">
    		  <div class="col-md-10 col-md-offset-1">
    			<div class="detail-info">
    			      <hgroup>
        				<br><br>
        				<h3 class="det-txt"><?php echo e($post->title); ?></h3>
        				<i class="sm-txt"><b>Created <?php echo e($post->created_at->diffForHumans()); ?></b></i>
                        <br><br><br>
    			      </hgroup>
    				<?php echo $post->content; ?>

					<br><br>
    		    </div>
    	      </div>
    		</div>
	      </div>
	    </section>
	    <!--/ Organisations-->

	<?php echo $__env->make('sections.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>