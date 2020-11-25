<nav style="background-color:#0285b1;" class="navbar navbar-default navbar-fixed-top">
  <div class="container">
  	<div class="col-md-12">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="https://achieversempir.com">A E</a>
	    </div>
	    <div class="collapse navbar-collapse navbar-right" id="myNavbar">
	      <ul class="nav navbar-nav">
	        <li><a href="/#service">Features</a></li>
	        <li><a href="/about">About</a></li>
	        <li><a href="/#testimonial">Testimonial</a></li>
	        <li><a href="/#contact">Contact</a></li>
	        <?php if(Auth::guest()): ?>
				<li><a href="/login">Sign In</a></li>
          		<li><a href="/register">Sign Up</a></li>
			<?php else: ?>
			<li><a href="<?php echo e(url('/dashboard')); ?>">DASHBOARD</a></li>
		     <?php if(Auth::user()->isAdmin() || Auth::user()->isReader()): ?>
			     <li><a href="<?php echo e(url('/admin')); ?>">ADMIN PANEL</a></li>
		     <?php endif; ?>
		     <li>
				<a href="<?php echo e(url('/logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
				    <i class="fa fa-sign-out" aria-hidden="true"></i>
				    LOGOUT
				</a>
			<form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
			    <?php echo e(csrf_field()); ?>

			</form>
		    </li>
		    <?php endif; ?>
	      </ul>
	    </div>
	</div>
  </div>
</nav>
