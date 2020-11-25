

<?php $__env->startSection('content'); ?>
<body>
	<div id="wrapper">
		<?php echo $__env->make('sections.d_header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo $__env->make('sections.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          		<?php if(session('error-status')): ?>
					<div class="alert alert-danger alert-dismissable">
					    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					    <div class="container-fluid">
					      <center><b>Error:</b> <?php echo e(session('error-status')); ?></center>
					    </div>
					</div>
				<?php endif; ?>
              <div class="row">
              		<div class="col-md-10 col-md-offset-1">
              		    <div class="panel panel-default">
							<div class="panel-heading">Tutorials</div>
							<div class="panel-body">
                                <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            				      <div class="col-md-12" style="overflow:hidden;">
            				      	<!--Card-->
            						<?php if($p->thumbnail != null): ?>
            							<img src="<?php echo e($p->thumbnail); ?>" class="img-responsive img-thumbnail" align="left" style="max-width:320px;min-height:170px; margin:5px" alt="<?php echo e($p->title); ?>">
            						<?php endif; ?>
            						<h3><a href="/blog/<?php echo e($p->url); ?>"><?php echo e($p->title); ?></a></h3>
            						<b><i class="fa fa-clock-o"></i> <i><?php echo e($p->created_at->toFormattedDateString()); ?></i></b>
            						<p style="text-align:justify;"><?php echo substr(strip_tags($p->content), 0, 550); ?>...</p>
            						<a class="btn btn-xs pull-right" style="padding:5px;" href="/blog/<?php echo e($p->url); ?>">Read more</a>
            						<br>
            						<hr>
            				      </div>
            					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <center><i>Tutorials will be added soon</i></center>
            					<?php endif; ?>
            					  <center><?php echo e($posts->links()); ?></center>
							</div>
                    </div>
              </div><!-- /row -->
          </div><!-- /col-lg-9 END SECTION MIDDLE -->
    </body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.d_app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>