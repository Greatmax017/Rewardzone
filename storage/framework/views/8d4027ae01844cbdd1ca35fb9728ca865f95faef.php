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
                        <li class="breadcrumb-item"><a href="#">Cashspring</a></li>
                        <li class="breadcrumb-item active">Downlines</li>
                      </ol>
                    </div>
                    <h4 class="page-title">My Downlines</h4>
                  </div>
                </div>
              </div>
              <!-- end page title end breadcrumb -->

              <div class="row">
               

              <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Referral/Affiliate</div>
                    <div class="card-body table-responsive">
                        <div>
                            <b>Direct Downlines:</b> (<?php echo e(auth::user()->referred_count(), false); ?>)<br>
                  <b>Total 2nd gen downlines:</b> (<?php echo e(auth::user()->referred_count_second_gen(), false); ?>)<br>
                   <b>Total 3rd downlines:</b> (<?php echo e(auth::user()->referred_count_third_gen(), false); ?>)<br>
									 <b>Total:</b> (<?php echo e(auth::user()->referred_count() + auth::user()->referred_count_second_gen()  +  auth::user()->referred_count_third_gen(), false); ?>)<br>
                            <br>
                            <br>

													</div>


                            <table class="table">
                                <thead>
                                    <tr>
                                    <th>User</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                         <th>Cycle</th>
                                        <th>direct</th>
                                        <th>Indirect</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($m->username, false); ?></td>
                                        <td><?php echo e($m->email, false); ?></td>
                                        <td><?php echo e($m->phone, false); ?></td>
                                        <td><?php echo e($m->cycle, false); ?></td>
                                        <td><?php echo e($m->referred_count(), false); ?></td>
                                        <td><?php echo e($m->referred_count_second_gen(), false); ?></td>



                                    </tr>


                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="3"><center><i>You have not referred anyone. share your referral link to get referral bonus</i></center></td>
                                    </tr>
                                    <?php endif; ?>
																		<tr>
																				<td colspan="3"><center><i>Swipe left for more>></i></center></td>
																		</tr>
                                </tbody>

                            </table>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div><br><br><br><br><br><br>
                            <?php echo e($users->links(), false); ?>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="alert">
                                        <p class="text-center">Your Referral Link is
                                            <a href="<?php echo e(url('/register').'?ref='.Auth::user()->username, false); ?>" style="word-wrap:break-word;"><b><?php echo e(url('/register').'?ref='.Auth::user()->username, false); ?></b></a>
                                        </p>
                                        <center>
                                            <br>
                                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(url('/register').'?ref='.Auth::user()->username, false); ?>" class="btn btn-sm btn-primary"><i class="fab fa-facebook"></i> Share on Facebook</a>
                                            <a href="whatsapp://send?text=<?php echo e(url('/register').'?ref='.Auth::user()->username, false); ?>&text=Register on Cashspring" class="btn btn-sm btn-success"><i class="fab fa-whatsapp"></i> Share on Whatsapp</a>
                                            <a href="https://t.me/share/url?url=<?php echo e(url('/register').'?ref='.Auth::user()->username, false); ?>&text=Register on Cashspring" class="btn btn-sm btn-primary"><i class="fab fa-telegram"></i> Share on Telegram</a>
                                        </center>
                                    </div>
                                    </div>
                                    </div>
                                </div class="col-lg-12">

             
                 
                          
            
                
        </div><br><br><br>
        
<?php echo $__env->make('sections.footer_2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.d_app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>