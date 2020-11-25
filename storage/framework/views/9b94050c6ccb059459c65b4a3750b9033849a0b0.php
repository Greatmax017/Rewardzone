

<?php $__env->startSection('content'); ?>

<!-- banner -->
<div class="inner_page-banner">
</div>
<!--//banner -->
<!-- short -->
<div class="using-border py-3">
    <div class="inner_breadcrumb  ml-4">
        <ul class="short_ls">
            <li>
                <a href="<?php echo e(url('/'), false); ?>">Home</a>
                <span>/</span>
            </li>
            <li>
                <a href="<?php echo e(url('/dashboard'), false); ?>">Dashboard</a>
                <span>/</span>
            </li>
            <li>Blog Item</li>
        </ul>
    </div>
</div>
<!-- //short-->
<!-- Inner Page Header serction end here -->
<section style="background:#eeeeee24;" class="about-inner py-lg-4 py-md-3 py-sm-3 py-3">
    <!-- Inner Page Header serction end here -->
    <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
	    <!--Organisations-->
	      <div class="container">
    		<div class="row">
    		  <div class="col-md-10 offset-md-1">
    			<div class="detail-info">
    				<?php echo $post->content; ?>

					<br><br>
    		    </div>
    	      </div>
    		</div>
	      </div>
	    <!--/ Organisations-->
	</div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>