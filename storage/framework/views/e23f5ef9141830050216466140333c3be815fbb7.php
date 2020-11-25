<?php $__env->startSection('content'); ?>
<body>

	<div id="wrapper">
		
		<?php echo $__env->make('sections.sidebar_2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
            


									<center>





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
                        <li class="breadcrumb-item"><a href="#">Rewardzone</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                      </ol>
                    </div>
                    <h4 class="page-title">Profile</h4>
                  </div>
                </div>
              </div>
              <!-- end page title end breadcrumb -->

              <div class="row">
               

              <form id="profile-form" class="form" role="form" method="POST" action="<?php echo e(url('/profile'), false); ?>">
                            <?php echo e(csrf_field(), false); ?>



                            <div class="form-group <?php echo e($errors->has('name') ? ' has-error' : '', false); ?>">
                                <label class="control-label">UserName</label>
                                <input type="text" class="form-control" placeholder="UserName" name="username" value="<?php echo e(Auth::user()->username, false); ?>" required readonly>
                                <?php if($errors->has('username')): ?>
                                <span class="label label-danger">
                                    <strong><?php echo e($errors->first('username'), false); ?></strong>
                                </span>
                                <?php endif; ?>
                            <div class="form-group <?php echo e($errors->has('name') ? ' has-error' : '', false); ?>">
                                <label class="control-label">Account Name</label>
                                <input type="text" class="form-control" placeholder="Account Name" name="name" value="<?php echo e(Auth::user()->name, false); ?>" required disabled>
                                <?php if($errors->has('name')): ?>
                                <span class="label label-danger">
                                    <strong><?php echo e($errors->first('name'), false); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group <?php echo e($errors->has('accountno') ? ' has-error' : '', false); ?>">
                                <label class="control-label">Account no/Wallet Address</label>
                                <input type="text" class="form-control" placeholder="Account Number" name="accountno" value="<?php echo e(Auth::user()->accountno, false); ?>" required autofocus>
                                <?php if($errors->has('accountno')): ?>
                                <span class="label label-danger">
                                    <strong><?php echo e($errors->first('accountno'), false); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group <?php echo e($errors->has('name') ? ' has-error' : '', false); ?>">
                                <label class="control-label">Bank</label>
                                <input type="text" class="form-control" placeholder="Bank" name="bank" value="<?php echo e(Auth::user()->bank, false); ?>" required autofocus>
                                <?php if($errors->has('bank')): ?>
                                <span class="label label-danger">
                                    <strong><?php echo e($errors->first('bank'), false); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>

                            <div class="form-group<?php echo e($errors->has('phone') ? ' has-error' : '', false); ?>">
                                <label class="control-label">Phone Number</label>
                                <input type="text" class="form-control" placeholder="Phone Number" value="<?php echo e(Auth::user()->phone, false); ?>" name="phone" required>
                                <?php if($errors->has('phone')): ?>
                                <span class="label label-danger">
                                    <strong><?php echo e($errors->first('phone'), false); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                          





                            <div class="form-group">
                                    <center>
                                        <a onclick="submitForm(this);" form-id="profile-form" form-action="Save these changes" style="margin-top:20px;" type="submit" class="btn btn-lg btn-primary">
                                            Save
                                        </a><br />
                                        If you want to reset your password click on the <a onclick="event.preventDefault(); document.getElementById('reset-password').submit();">reset password</a> link and provide your email address
                                    </center>
                            </div>
                        </form>
                        <form id="reset-password" action="<?php echo e(url('/reset_password'), false); ?>" method="POST" style="display: none;">
                            <?php echo e(csrf_field(), false); ?>

                        </form>
              </div>
              

             
                 
                          
            
                
        </div><br><br><br>
</section>
        
<?php echo $__env->make('sections.footer_2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.d_app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>