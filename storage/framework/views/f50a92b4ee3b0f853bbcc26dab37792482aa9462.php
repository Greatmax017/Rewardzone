<?php $__env->startSection('content'); ?>
<body>
<?php echo $__env->make('sections.sidebar_2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div id="wrapper">
		
		



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
                        <li class="breadcrumb-item"><a href="#">Rewardzone</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                      </ol>
                    </div>
                    <h4 class="page-title">Dashboard</h4>
                  </div>
                </div>
              </div>
              <!-- end page title end breadcrumb -->
<?php if(session('address')): ?>
        <div class="alert alert-info">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <div class="container-fluid">
                <center><?php echo session('address'); ?></center>
            </div>
        </div>
        <?php endif; ?>
        <?php if($errors->any()): ?>
            <div class="alert alert-danger alert-dismissable text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error, false); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
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
                <center> <?php echo e(session('success-status'), false); ?></center>
            </div>
        </div>
        <?php endif; ?>

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
                        <div class="col-10 align-self-center text-center">
                          <div class="m-l-15">
                              <!-- Earnings for cycle 1 -->
                              

													 <h5 class="mt-0 round-inner">  &#8377;<?php echo e(number_format((\App\Transaction::where('sender', Auth::user()->id)->whereIn('status', [1, 2])->sum('amount') *74), 2), false); ?></h5>
                            <p class="mb-0 text-muted">Active Investment</p>
                           
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
                        <div class="col-10 text-center align-self-center">
                          <div class="m-l-15 ">
                            <h5 class="mt-0 round-inner"><?php echo e(round(\App\Transaction::where('sender', Auth::user()->id)->whereIn('status', [1, 2])->count('amount' ), 2), false); ?></h5>
                            <p class="mb-0 text-muted">NO. of Investment</p>
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
                        <div class="col-10 align-self-center text-center">
                          <div class="m-l-15">	
                            <h5 class="mt-0 round-inner">&#8377;<?php echo e(number_format((\App\Transaction::where('sender', Auth::user()->id)->whereIn('status', [3])->sum('amount')* 74), 2), false); ?></h5>
                            <p class="mb-0 text-muted">Total Withdrawn</p>
                           
                           
                         
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
                            <h5 class="mt-0 round-inner"><?php echo e(auth::user()->referred_count(), false); ?></h5>
                            <p class="mb-0 text-muted">Referral
                            </p>
                          </div>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </div>
                  
                <!-- Column -->
              </div>
              
<div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Recent Investment</div>
                    <div class="card-body table-responsive">
                        <div>
                           

													</div>


                            <table class="table">
                                <thead>
                                    <tr>
                                    <th>ID</th>
                                        <th>Amount</th>
                                        <th>Earning</th>
                                         <th>Status</th>
                                        <th>date</th>
                                        <th>days</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $active_shares; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e(substr($t->id, 0, 13), false); ?></td>
                                        <td>&#8377;<?php echo e(number_format((float)$t->amount * 74, 2), false); ?></td>
                                        <td>&#8377;<?php echo e(number_format((float)$t->current_value * 74, 2), false); ?> </td>
                                        <td>
                                        <?php if($t->status == 0): ?>
                                            <span class="badge badge-warning">Pending </span><br>
                                              <?php if($t->method == 0): ?>
                                        <p class="alert alert-info alert-dismissible fade show">

                                            Transfer the equivalent of $<?php echo e($t->amount, false); ?> worth of Bitcoin to <?php echo e($t->paid_to, false); ?>

                                        </p>
                                              <?php else: ?>
                                            Atm card <br />


                                            <form method="post" action="/pay" accept-charset="UTF-8" class="form-horizontal" role="form">
                                            <?php echo e(csrf_field(), false); ?>


                                              <input type="hidden" name="email" value="<?php echo e(Auth::user()->email, false); ?>"> 
                                             
                                              <input type="hidden" name="orderID" value="345">
                                              <input type="hidden" name="amount" value="<?php echo e($t->amount * 100 * 463, false); ?>"> 

                                              <input type="hidden" name="quantity" value="3">
                                              <input type="hidden" name="currency" value="NGN">

                                              <input type="hidden" name="metadata" value="<?php echo e(json_encode($array = ['user_t_id' =>  $t->id,]), false); ?>" > 
                                               <!-- For other necessary things you want to add to your payload. it is optional though  -->
                                              
                                              <input type="hidden" name="reference" value="<?php echo e(Paystack::genTranxRef(), false); ?>"> 

                                          <button class="btn btn-sm btn-primary" type="submit" value="Pay Now!" id="Pay-Now">Pay Now</button>
                                          </form>
                                              <?php endif; ?>
                                        


                                            <?php elseif($t->status == 1): ?>
                                            <span class="badge badge-warning">active </span>
                                            <?php elseif($t->status == 2): ?>
                                            <form method="post" action="<?php echo e(url('/withdraw/'.$t->id), false); ?>">
                                                <?php echo csrf_field(); ?>
                                            <button class="btn btn-sm btn-info" type="submit">Withdraw</button>
                                            </form>
                                            <?php elseif($t->status == 3): ?>
                                            <span class="badge badge-pill badge-success d-block mg-t-8">Paid</span>
                                            <?php else: ?>
                                            <span class="badge badge-danger">Failed</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($t->created_at->toDayDateTimeString(), false); ?></td>
                                        <td><?php echo e($t->days, false); ?></td>



                                    </tr>


                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="3"><center><i>You have no recent transaction, Click <a href="" data-toggle="modal" data-target="#modalRegisterForm"> here to invest now</a></i></center></td>
                                    </tr>
                                    <?php endif; ?>
																		
                                </tbody>

                            </table>
                            </div>
                            </div>
                            </div>
                            </div>
             
                 
                          <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">New Investment</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="<?php echo e(url('/investment-request'), false); ?>" method="post">
     <?php echo e(csrf_field(), false); ?>



      <div class="modal-body mx-3">
        <div class="md-form mb-5">
         
          <select name="amount" class="form-control">
          <option value="67.5">&#8377;5000</option>
          <option value="135">&#8377;10000</option>
          <option value="270">&#8377;20000</option>
          <option value="675">&#8377;50000</option>
          <option value="1351">&#8377;100000</option>
          </select>
          <label data-error="wrong" data-success="right" for="orangeForm-name">Choose a Plan</label>
        </div>
        <div class="md-form mb-5">
          
          <select id="orangeForm-email" class="form-control validate" name="method">
          <option value="0">Bitcoin</option>
          <option value="1">Credit Card/Debit Card</option>
          </select>
          <label data-error="wrong" data-success="right" for="orangeForm-email">Payment Method</label>
        </div>

       

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button type="submit" class="btn btn-secondary">Proceed</button>
      </div>
    </div>
  </div>
</div>

</form>
            
                
        </div>
        
<?php echo $__env->make('sections.footer_2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.d_app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>