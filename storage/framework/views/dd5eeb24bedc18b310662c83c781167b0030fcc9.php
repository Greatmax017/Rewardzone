<?php $__env->startSection('content'); ?>
<body class="not-landing landing-page landing-page1">

        <?php echo $__env->make('sections.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/598de409dbb01a218b4dbf1f/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
        <div class="bg-color-light">
    	   <div class="container content-sm">
    		      <div class="headline-center-v2 headline-center-v2-dark">
        			<h2>Contact Information</h2>
        			<span class="bordered-icon"><i class="fa fa-th-large"></i></span>
        			<p> The fastest means to contact us is by using the live chat box at the buttom right corner, our consultants are online from 9.am-4.pm Mondays through Fridays.

Our Customer care line is also Available to answer all request from 9.am-4.pm Mondays through Fidays, all queries are welcome.
<br />
Telephone:<a href="tel:08167863189"> +2348167863189</a><br />
E-mail: <a href="mailto:support@todaylift.com:">support@todaylift.com</a>
</p>
</div>
    </div>
    </div>
</div>
	<div class="wrapper">
		<div class="parallax filter-gradient blue" data-color="blue">
                <div class= "container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="description text-center">
                                <h2>Contact Form</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section section-clients">
                <div class="container">
		    <div class="row">
		   	<div class="col-lg-12">
				<div class="col-md-8 col-md-offset-2">
					<?php if(session('success-status')): ?>
					    	<div class="alert alert-success">
						    <div class="container-fluid">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
							  </button>
						       <center><?php echo e(session('success-status')); ?></center>
						    </div>
						</div>
					<?php endif; ?>
					<div class="panel panel-success">
							<div class="panel-heading">Contact Form</div>
							<div class="panel-body">
								<form id="send-message" class="form" role="form" method="POST" action="<?php echo e(url('/contact_us')); ?>">
									<?php echo e(csrf_field()); ?>


									<div class="form-group<?php echo e($errors->has('subject') ? ' has-error' : ''); ?>">
									   <label for="subject" class="control-label">Your Name:</label>
									   <input id="subject" type="text" class="form-control" placeholder="Full Name" name="name" value="<?php echo e(old('name')); ?>" required autofocus>
										<?php if($errors->has('name')): ?>
										    <span class="label label-danger">
											<strong><?php echo e($errors->first('name')); ?></strong>
										    </span>
										<?php endif; ?>
									</div>


									<div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
									   <label for="email" class="control-label">Your Email:</label>
									   <input id="email" type="email" class="form-control" placeholder="example@todaylift.com" name="email" value="<?php echo e(old('email')); ?>" required>
										<?php if($errors->has('email')): ?>
										    <span class="label label-danger">
											<strong><?php echo e($errors->first('email')); ?></strong>
										    </span>
										<?php endif; ?>
									</div>

									<div class="form-group<?php echo e($errors->has('subject') ? ' has-error' : ''); ?>">
									   <label for="subject" class="control-label">Subject:</label>
									   <input id="subject" type="text" class="form-control" placeholder="Message Subject" name="subject" value="<?php echo e(old('subject')); ?>" required>
										<?php if($errors->has('subject')): ?>
										    <span class="label label-danger">
											<strong><?php echo e($errors->first('subject')); ?></strong>
										    </span>
										<?php endif; ?>
									</div>

									<div class="form-group">
									    <label for="message" class="control-label">Message:</label><br />
									    <textarea class="form-control" rows="6" name="message"><?php echo e(old('message')); ?></textarea>
									</div>

									<br />

									<div class="form-group">
									    <div style="margin-top:20px;" class="col-md-8 col-md-offset-2 text-center">
										<a onclick="submitForm(this);" form-id="send-message" form-action="send this message" class="btn btn-lg btn-primary">
										    Send Message
										</a><br /><br />
									    </div>
									</div>
								    </form>
							</div>
					</div>
				</div>
			</div>
		    </div>
		</div>
            </div>

		 <?php echo $__env->make('sections.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>

    </body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>