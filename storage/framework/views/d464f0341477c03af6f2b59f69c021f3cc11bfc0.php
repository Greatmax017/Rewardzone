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
                      <h5>Welcome <?php echo e(auth::user()->username, false); ?> </h5>
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
                        <li class="breadcrumb-item active">Dashboard</li>
                      </ol>
                    </div>
                    <h4 class="page-title">Dashboard</h4>
                  </div>
                </div>
              </div>
              <!-- end page title end breadcrumb -->

              <div class="row">
                <!-- Column -->
                <div class="col-md-6 col-lg-6 col-xl-3">
                  <div class="card m-b-30">
                    <div class="card-body">
                      <div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                          <div class="round">
                            <i class="mdi mdi-square-inc-cash"></i>
                          </div>
                        </div>
                        <div class="col-6 align-self-center text-center">
                          <div class="m-l-10">
                              <!-- Earnings for cycle 1 -->
                              

													<?php if( ctype_alpha($firstCharacter)): ?>
                                      
                            <h5 class="mt-0 round-inner">&#8358;30,000</h5>
                                     
                                        
                          <?php endif; ?>
                          <?php if( ($firstCharacter == 1)): ?>
                                      
                            <h5 class="mt-0 round-inner">&#8358;10,000</h5>
                                     
                                        
                          <?php endif; ?>
                          <?php if(($firstCharacter == 2)): ?>
                                      
                            <h5 class="mt-0 round-inner">&#8358;15,000</h5>
                                     
                                        
                          <?php endif; ?>
                       <?php if( auth::user()->withamt < 2 && auth::user()->referred_count() == 2 && auth::user()->referred_count_second_gen() == 4 && auth::user()->referred_count_third_gen() == 8 ): ?>
                            <p class="mb-0 text-muted">Earnings</p>
                            <?php else: ?>
                            <p class="mb-0 text-muted">Earnings in View</p>
                            <?php endif; ?>
                          </div>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-md-6 col-lg-6 col-xl-3">
                  <div class="card m-b-30">
                    <div class="card-body">
                      <div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                          <div class="round">
                            <i class="mdi mdi-account-multiple-plus"></i>
                          </div>
                        </div>
                        <div class="col-6 text-center align-self-center">
                          <div class="m-l-10 ">
                            <h5 class="mt-0 round-inner"><?php echo e(auth::user()->referred_count() + auth::user()->referred_count_second_gen() + auth::user()->referred_count_third_gen(), false); ?></h5>
                            <p class="mb-0 text-muted">Total Downlines</p>
                          </div>
                        </div>
                       
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-md-6 col-lg-6 col-xl-3">
                  <div class="card m-b-30">
                    <div class="card-body">
                      <div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                          <div class="round ">
                            <i class="mdi mdi-package-variant "></i>
                          </div>
                        </div>
                        <div class="col-6 align-self-center text-center">
                          <div class="m-l-10 ">

                          	<?php if( ($firstCharacter == 1)): ?>
                            <h5 class="mt-0 round-inner">Cycle 1</h5>
                            <?php elseif( $firstCharacter == 2 ): ?>
                              <h5 class="mt-0 round-inner">Cycle 2</h5>
                            <?php else: ?> 
                              <h5 class="mt-0 round-inner">Cycle 3</h5>

                            <?php endif; ?>
                           
                         
                          </div>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-md-6 col-lg-6 col-xl-3">
                  <div class="card m-b-30">
                    <div class="card-body">
                      <div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                          <div class="round">
                            <i class="mdi mdi-rocket"></i>
                          </div>
                        </div>
                        <div class="col-6 align-self-center text-center">
                          <div class="m-l-10">
                            <h5 class="mt-0 round-inner"><?php echo e(auth::user()->referred_count() + auth::user()->referred_count_second_gen() + auth::user()->referred_count_third_gen()  - 6, false); ?></h5>
                            <p class="mb-0 text-muted">Downlines left
                            </p>
                          </div>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </div>
                  <?php if(($firstCharacter == 1 ) && auth::user()->withamt < 2 && auth::user()->referred_count() == 2 && auth::user()->referred_count_second_gen() == 4 && auth::user()->referred_count_third_gen() == 8 ): ?>

																		<form id="profile2-form" class="form" role="form" action="/profile2" method="post">
																		<?php echo e(csrf_field(), false); ?>

																		<input type="hidden" name="withamt" value="10000">

																	 <button style="" type="submit" class="btn btn-lg btn-success" >
																		 	Withdraw
																		 </button>
                                    <?php endif; ?>




                                      <?php if( ($firstCharacter ==2) && auth::user()->withamt < 2 && auth::user()->referred_count() == 2 && auth::user()->referred_count_second_gen() == 4 && auth::user()->referred_count_third_gen() == 8 ): ?>

																		<form id="profile2-form" class="form" role="form" action="/profile2" method="post">
                                    <?php echo e(csrf_field(), false); ?>

                                    <input type="hidden" name="withamt" value="15000">
                                   <button style="" type="submit" class="btn btn-lg btn-success">
																		 	withdraw
    											</button>
                          <?php endif; ?>
                           <?php if( ctype_alpha($firstCharacter) && auth::user()->withamt < 2 && auth::user()->referred_count() == 2 && auth::user()->referred_count_second_gen() == 4 && auth::user()->referred_count_third_gen() == 8 ): ?>

																		<form id="profile2-form" class="form" role="form" action="/profile2" method="post">
                                    <?php echo e(csrf_field(), false); ?>

                                    <input type="hidden" name="withamt" value="30000">
                                   <button style="" type="submit" class="btn btn-lg btn-success">
																		 	withdraw
    											</button>
													<?php endif; ?>
													<?php if(Auth::user()->withamt > 1000 && auth::user()->suspended == 0 ): ?>
													<p><font color="green">Congratulations! your withdrawal is now processing and will be completed within 48hrs,<br> kindly proceed to cycle 2 or get  a cycle 1 coupon again!</font></p>

													<?php endif; ?>
													<?php if(Auth::user()->withamt > 1000 && auth::user()->suspended == 1 ): ?>

														<p><font color="blue">Congratulations! your withdrawal of <?php echo e(Auth::user()->withamt, false); ?> has been paid to your <?php echo e(auth::user()->bank, false); ?> Account! </font></p>
													<?php endif; ?>
                <!-- Column -->
              </div>
              

             
                 
                          
            
                
        </div>
        
<?php echo $__env->make('sections.footer_2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.d_app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>