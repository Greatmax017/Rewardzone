<?php $__env->startSection('content'); ?>


<!--about-->
<!-- register -->





<section class="register py-lg-4 py-md-3 py-sm-3 py-3">
    <div class="container py-lg-5 py-md-5 py-sm-4 py-3">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 text-center register-form">
                <div class="wls-register-form">
                    <h4><b>Create An Account</b></h4>
					<p><a href="/coupon" >Click here to get Coupon</a></p>


                    <br>
                    <div class="col-md-12">
                        <?php if(session('error-status')): ?>
                                <div class="alert alert-danger">
                                <div class="container-fluid">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                                  </button>
                                  <b>Error:</b> <?php echo e(session('error-status'), false); ?>

                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if(session('success-status')): ?>
                                <div class="alert alert-success">
                                <div class="container-fluid">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                                  </button>
                                  <?php echo e(session('success-status'), false); ?>

                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="card">
                                <div class="card-body">
                                    <form class="form" role="form" method="POST" action="<?php echo e(url('/register'), false); ?>">
    									<?php echo e(csrf_field(), false); ?>

										<label class="control-label">Upline's username<span style="color:red;">*</span></label>
    									<input type="text" class="form-control" placeholder="uplines's username" value="<?php if($referrer != null): ?><?php echo e($referrer->username, false); ?><?php endif; ?>" name="referrer">
										<div class="form-group <?php echo e($errors->has('username') ? ' has-error' : '', false); ?>">
    										<label class="control-label">Username<span style="color:red;">*</span></label>
    										<input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo e(old('username'), false); ?>" required autofocus>
    										<?php if($errors->has('username')): ?>
    										    <span class="badge badge-danger">
    											<strong><?php echo e($errors->first('username'), false); ?></strong>
    										    </span>
    										<?php endif; ?>
    									</div>

    									<div class="form-group <?php echo e($errors->has('name') ? ' has-error' : '', false); ?>">
    										<label class="control-label">Full Name<span style="color:red;">*</span></label>
    										<input type="text" class="form-control" placeholder="Full Name" name="name" value="<?php echo e(old('name'), false); ?>" required autofocus>
    										<?php if($errors->has('name')): ?>
    										    <span class="badge badge-danger">
    											<strong><?php echo e($errors->first('name'), false); ?></strong>
    										    </span>
    										<?php endif; ?>
    									</div>

    									<div class="form-group<?php echo e($errors->has('email') ? ' has-error' : '', false); ?>">
    										<label class="control-label">Email address<span style="color:red;">*</span></label>
    										<input type="email" class="form-control" placeholder="email@example.com" name="email" value="<?php echo e(old('email'), false); ?>" required>
    										<?php if($errors->has('email')): ?>
    										    <span class="badge badge-danger">
    											<strong><?php echo e($errors->first('email'), false); ?></strong>
    										    </span>
    										<?php endif; ?>
    									</div>

    									<div class="form-group<?php echo e($errors->has('phone') ? ' has-error' : '', false); ?>">
    										<label class="control-label">Phone Number<span style="color:red;">*</span></label>
    										<input type="text" class="form-control" placeholder="Phone Number" value="<?php echo e(old('phone'), false); ?>" name="phone" required>
    										<?php if($errors->has('phone')): ?>
    										    <span class="badge badge-danger">
    											<strong><?php echo e($errors->first('phone'), false); ?></strong>
    										    </span>
    										<?php endif; ?>
    									</div>
										<div class="form-group">
    										<label class="control-label">Bank<span style="color:red;">*</span></label>
    										<input type="text" class="form-control" placeholder="Bank" name="bank" value="<?php echo e(old('bank'), false); ?>" required autofocus>

    									</div>

                                        <div class="form-group<?php echo e($errors->has('accountno') ? ' has-error' : '', false); ?>">
    										<label class="control-label">Account Number<span style="color:red;">*</span></label>
    										<input type="text" class="form-control" placeholder="Account number" value="<?php echo e(old('accountno'), false); ?>" name="accountno">
    										<?php if($errors->has('accountno')): ?>
    										    <span class="badge badge-danger">
    											<strong><?php echo e($errors->first('accountno'), false); ?></strong>
    										    </span>
    										<?php endif; ?>
    									</div>

										<div class="form-group<?php echo e($errors->has('password') ? ' has-error' : '', false); ?>">
											<label class="control-label">Password<span style="color:red;">*</span></label>
											<input type="password" class="form-control" placeholder="Password" name="password" required>
											<?php if($errors->has('password')): ?>
											    <span class="badge badge-danger">
												<strong><?php echo e($errors->first('password'), false); ?></strong>
											    </span>
											<?php endif; ?>
										</div>

										<div class="form-group">
											<label class="control-label">Confirm password<span style="color:red;">*</span></label>
											<input type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required>
										</div>

										<div class="form-group <?php echo e($errors->has('coupon') ? ' has-error' : '', false); ?>">
    										<label class="control-label">Coupon<span style="color:red;">*</span></label>
    										<input type="text" id="name" name="coupon" class="form-control" value="" required autofocus >
                        <?php if($errors->has('coupon')): ?>
                            <span class="badge badge-danger">
                          	<strong><?php echo e($errors->first('coupon'), false); ?></strong>
                          		</span>
                          <?php endif; ?>

    									</div>
										<div class="form-group ">

    										<input type="hidden" id="display" placeholder="Cycle" class="form-control" name="cycle" value="1" readonly >


    									</div>




										<div class="form-group ">

    										<input type="hidden" class="form-control" placeholder="" name="level" value="1" required autofocus>

    									</div>
											<?php

											$month = date('m');
											$day = date('d');
											$year = date('Y');

											$today = $year . '-' . $month . '-' . $day;
											?>


										<div class="form-group ">
    										<label class="control-label"><span style="color:red;"></span></label>
    										<input type="hidden" class="form-control" placeholder="" name="date" value="<?php echo $today; ?>" required autofocus readonly>

    									</div>



										<p>By Clicking the sign up button you agree to our Terms &amp; conditons</p>
    									<div class="form-group">
    										<center>
    											<button style="margin-top:20px;" type="submit" class="btn btn-lg btn-primary">
    											    Sign Up
    											</button>
    										</center>
    									</div>
										<p>Already have an account? <a href="/login">Login here</a>
    							    </form>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>





 <script type="text/javascript">
        document.getElementById("name").onkeyup = function() {
			 var letter = this.value.match(/^([A-Za-z])/);
			if(letter !== null) {

            document.getElementById("display").value = "2";
        }
		}
    </script>
</body>
</html>
<!--// register -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>