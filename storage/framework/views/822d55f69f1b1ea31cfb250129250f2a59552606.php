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
					      <center><b>Error:</b> <?php echo e(session('error-status'), false); ?></center>
					    </div>
					</div>
				<?php endif; ?>
				<?php if(session('success-status')): ?>
					<div class="alert alert-success alert-dismissable">
					    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					    <div class="container-fluid">
						<center><?php echo e(session('success-status'), false); ?></center>
					    </div>
					</div>
				<?php endif; ?>
              <div class="row">
              		<div class="col-md-8 col-md-offset-2">
                        <br>
                    	<div class="panel panel-danger">
							<div class="panel-heading">Blog Articles</div>
							<div class="panel-body table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th>Title</th>
											<th>Thumbnail</th>
                                            <th>Created</th>
                                            <th>Viewed</th>
                                            <th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
										<tr>
											<td class="col-md-2"><b><?php echo e($c->title, false); ?></b></td>
											<td class="col-md-2"><b><?php if(!is_null($c->thumbnail)): ?><a href="<?php echo e($c->thumbnail, false); ?>" target="_blank">View</a><?php endif; ?></b></td>
                                            <td class="col-md-2"><b><?php echo e($c->created_at->toDayDateTimeString(), false); ?></b></td>
                                            <td class="col-md-2"><b><?php echo e($c->view_count, false); ?></b></td>
											<td class="col-md-2">
                                                <?php if(Auth::user()->isAdmin()): ?>
                                                <a onclick="submitForm(this);" form-id="post-delete-form-<?php echo e($c->id, false); ?>" form-action="delete this article" class="btn btn-sm btn-danger">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                </a>
                                                <a href="/admin/blog/<?php echo e($c->id, false); ?>/edit" class="btn btn-sm btn-primary">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </a>
                                                <form id="post-delete-form-<?php echo e($c->id, false); ?>" class="form" role="form" method="POST" action="/admin/blog/<?php echo e($c->id, false); ?>">
													<?php echo e(csrf_field(), false); ?>

                                                    <input type="hidden" name="_method" value="delete" />
													<input type="hidden" value="<?php echo e($c->id, false); ?>" name="post" />
												</form>
                                                <?php endif; ?>

											</td>
										</tr>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
										<tr>
											<td colspan="5"><center><i>No Articles Created yet</i></center></td>
										</tr>
										<?php endif; ?>
									</tbody>
								</table>
								<?php if(Auth::user()->isAdmin()): ?>
								<div class="form-group">
									<center>
										<a type="button" href="/admin/blog/create" class="btn btn-danger">Add New Article</a>
									</center>
								</div>
								<?php endif; ?>
							</div>
						</div>
                    </div>
              </div><!-- /row -->
        </div><!-- /col-lg-9 END SECTION MIDDLE -->
    </body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.d_app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>