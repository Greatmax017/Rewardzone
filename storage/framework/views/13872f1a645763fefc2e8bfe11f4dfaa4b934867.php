

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
				<?php if(session('success-status')): ?>
					<div class="alert alert-success alert-dismissable">
					    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					    <div class="container-fluid">
						<center><?php echo e(session('success-status')); ?></center>
					    </div>
					</div>
				<?php endif; ?>
              <div class="row">
              		<div class="col-md-8 col-md-offset-2">
                        <?php if(empty($post)): ?>
                        <div class="panel panel-default" style="color:black;">
                          <div class="panel-heading">New Article</div>
                          <div class="panel-body">
                              <form class="form-horizontal" method="post" action="/admin/blog" enctype="multipart/form-data">
                                  <?php echo e(csrf_field()); ?>

                                  <label for="show_on_home">Title of Article</label>
                                  <input type="text" class="form-control" name="title" value="<?php echo e(old('article')); ?>" placeholder="Enter title" required>
                                  <br>
                                  <textarea name="content" id="summernote"><?php echo old('content'); ?></textarea>
                                  <br>
                                  <label for="show_on_home">Is Featured</label>
                                  <select class="form-control" name="featured">
                                      <option value="0">No</option>
                                      <option value="1">Yes</option>
                                  </select>
                                  <br>
                                  <label for="show_on_home">Is Tutorial</label>
                                  <select class="form-control" name="tutorial">
                                      <option value="0">No</option>
                                      <option value="1">Yes</option>
                                  </select>
                                  <button type="submit" class="btn btn-block btn-success">Save</button>
                              </form>
                		  </div>
                        <?php else: ?>
                        <div class="panel panel-default" style="color:black;">
                          <div class="panel-heading">Edit Article</div>
                          <div class="panel-body">
                              <form class="form-horizontal" method="post" action="/admin/blog/<?php echo e($post->id); ?>" enctype="multipart/form-data">
                                  <?php echo e(csrf_field()); ?>

                                  <input type="hidden" name="_method" value="put" />
                                  <label>Title of Article</label>
                                  <input type="text" class="form-control" name="title" value="<?php echo e($post->title); ?>" placeholder="Enter title" required>
                                  <br>
                                  <textarea name="content" id="summernote"><?php echo $post->content; ?></textarea>
                                  <br>
                                  <label for="show_on_home">Is Featured</label>
                                  <select class="form-control" name="featured">
                                      <option value="0" <?php if($post->featured == 0): ?> selected='selected' <?php endif; ?>>No</option>
                                      <option value="1" <?php if($post->featured == 1): ?> selected='selected' <?php endif; ?>>Yes</option>
                                  </select>
                                  <br>
                                  <label for="show_on_home">Is Tutorial</label>
                                  <select class="form-control" name="tutorial">
                                      <option value="0" <?php if($post->tutorial == 0): ?> selected='selected' <?php endif; ?>>No</option>
                                      <option value="1" <?php if($post->tutorial == 1): ?> selected='selected' <?php endif; ?>>Yes</option>
                                  </select>
                                  <button type="submit" class="btn btn-block btn-success">Save</button>
                              </form>
                		  </div>
                        <?php endif; ?>
                    </div>
              </div><!-- /row -->
        </div><!-- /col-lg-9 END SECTION MIDDLE -->
    </body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.d_app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>