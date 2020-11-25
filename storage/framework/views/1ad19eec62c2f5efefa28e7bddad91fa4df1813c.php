<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sections.sidebar_2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body>

	<div id="wrapper">
		
		
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
			                <center>
                <?php endif; ?> 
 




									 <!-- Start right Content here -->

      <div class="content-page">
        <!-- Start content -->
        <div class="content">
          <!-- Top Bar Start -->
          <div class="topbar">
            <nav class="navbar-custom">
              <ul class="list-inline float-right mb-0">
                <!-- language-->
                
                <li class=" list-inline-item dropdown notification-list">
                  <a
                   class="<?php echo e(Request::is('new_message') ? 'active' : '', false); ?>"  href="<?php echo e(url('/messagebox'), false); ?>"
                    
                  >
                    <i class="ti-email noti-icon"></i>
                    <span class="badge badge-danger noti-icon-badge"></span>
                  </a>
                 

                

                   

                <li class="list-inline-item dropdown notification-list">
                  <a
                    class="nav-link dropdown-toggle arrow-none waves-effect nav-user"
                    data-toggle="dropdown"
                    href="#"
                    role="button"
                    aria-haspopup="false"
                    aria-expanded="false"
                  >
                    <img
                      src="assets/images/users/avatar-1.jpg"
                      alt="user"
                      class="rounded-circle"
                    />
                  </a>
                  <div
                    class="dropdown-menu dropdown-menu-right profile-dropdown "
                  >
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                      <h5>Welcome</h5>
                    </div>
                    <a class="dropdown-item" href="<?php echo e(url('/profile'), false); ?>"
                      ><i class="mdi mdi-account-circle m-r-5 text-muted"></i>
                      Profile</a
                    >
                    
                   
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo e(url('/logout'), false); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                      ><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a
                    >
                  </div>
                </li>
              </ul>

              <ul class="list-inline menu-left mb-0">
                <li class="float-left">
                  <button
                    class="button-menu-mobile open-left waves-light waves-effect"
                  >
                    <i class="mdi mdi-menu"></i>
                  </button>
                </li>
               
              </ul>

              <div class="clearfix"></div>
            </nav>
          </div>
          <!-- Top Bar End -->

          <div class="page-content-wrapper ">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-12">
                  <div class="page-title-box">
                    <div class="btn-group float-right">
                      <ol class="breadcrumb hide-phone p-0 m-0">
                        <li class="breadcrumb-item"><a href="#">Cashspring</a></li>
                        <li class="breadcrumb-item active">Support Messages</li>
                      </ol>
                    </div>
                    <h4 class="page-title">Support Messages</h4>
                  </div>
                </div>
              </div>
              <!-- end page title end breadcrumb -->

              <div class="row">
               

            <div class="col-md-10 offset-md-1">
                <div class="panel panel-primary">
                    <div class="panel-body">
                      


                        <table class="table">
                                <thead>
                                    <tr>
                                        <th>Subject</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><a href="<?php echo e(url('/message/'.$m->id), false); ?>" <?php if($m->message_read == 0): ?> style="font-weight:900;" <?php endif; ?>><?php echo e(isset($m->subject) ? $m->subject : '', false); ?></a></td>
                                        <td><span <?php if($m->message_read == 0): ?> style="font-weight:900;" <?php endif; ?>><?php echo e($m->created_at->diffForHumans(), false); ?></span> <br><small><?php echo e($m->created_at->toDayDateTimeString(), false); ?></small></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="3"><center><i>No messages in your inbox</i></center></td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                            <?php echo e($messages->links(), false); ?>

                        </div>
                    </div>
                </div>
                </div>
                </div>
                <hr>

                 <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="panel panel-primary">
                    <div class="panel-body">
                      
                    <div class="card-header">Sent Messages
                        <a href="<?php echo e(url('/message'), false); ?>" class="btn btn-sm btn-info float-right">
                            <i class="fa fa-plus"></i> New Message
                        </a>
                    
                    <div class="card-body">
                        <div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Subject</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $messages_sent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><a href="<?php echo e(url('/message/'.$m->id), false); ?>"><?php echo e(isset($m->subject) ? $m->subject : '', false); ?></a></td>
                                        <td><?php echo e($m->created_at->toDayDateTimeString(), false); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="3"><center><i>You have not sent any messages yet</i></center></td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
</div>


             
                 
                          
            
                
      </div>
                </div>
            </div>
           </div><!-- /row -->
    </div><!-- /col-lg-9 END SECTION MIDDLE -->
</section>
<?php echo $__env->make('sections.footer_2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.d_app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>