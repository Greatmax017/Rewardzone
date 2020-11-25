<!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

              	  <h5 class="centered"><?php echo e(Auth::user()->name, false); ?></h5>

                  <li>
                      <a class="<?php echo e(Request::is('dashboard') ? 'active' : '', false); ?>"  href="<?php echo e(url('/dashboard'), false); ?>">
                          <i class="fa fa-desktop"></i>
                          <span><font color="black"> Dashboard</font></span>
                      </a>
                  </li>
              	<?php if(Auth::user()->isAdmin() || Auth::user()->isReader()): ?>
			    <li>
				<a class="<?php echo e(Request::is('admin*') ? 'active' : '', false); ?>" href="#"><i class="fa fa-edit "></i>Admin Panel<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
				  <li><a class="<?php echo e(Request::is('admin') ? 'active' : '', false); ?>" href="<?php echo e(url('/admin'), false); ?>">General</a></li>
				  <li><a class="<?php echo e(Request::is('admin/users') ? 'active' : '', false); ?>" href="<?php echo e(url('/admin/users'), false); ?>">Users</a></li>
          <li><a class="<?php echo e(Request::is('admin/coupon') ? 'active' : '', false); ?>" href="<?php echo e(url('/admin/admincoupon'), false); ?>">Coupon</a></li>
				  <li><a class="<?php echo e(Request::is('admin/withdrawals') ? 'active' : '', false); ?>" href="<?php echo e(url('/admin/withdrawals'), false); ?>">Withdrawals</a></li>
          <li><a class="<?php echo e(Request::is('admin/withdrawn') ? 'active' : '', false); ?>" href="<?php echo e(url('/admin/withdrawn'), false); ?>">Withdrawn</a></li>
                  <li><a class="<?php echo e(Request::is('admin/blog') ? 'active' : '', false); ?>" href="<?php echo e(url('/admin/blog'), false); ?>">Blog</a></li>
                      <li><a class="<?php echo e(Request::is('admin/deleted') ? 'active' : '', false); ?>" href="<?php echo e(url('/admin/deleted'), false); ?>">Deleted</a></li>
                  <li><a class="<?php echo e(Request::is('admin/messagebox') ? 'active' : '', false); ?>" href="<?php echo e(url('/admin/messagebox'), false); ?>">Support(<b><?php echo e(Auth::user()->received_messages_admin()->where('message_read', 0)->count(), false); ?></b>)</a></li>
				</ul>
			    </li>
			    <?php endif; ?>



              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
