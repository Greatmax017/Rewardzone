<!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

              	  <h5 class="centered"><?php echo e(Auth::user()->name, false); ?></h5>

                  <li>
                      <a class="<?php echo e(Request::is('dashboard') ? 'active' : '', false); ?>"  href="<?php echo e(url('/dashboard'), false); ?>">
                          <i class="fa fa-desktop"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
              	<?php if(Auth::user()->isAdmin() || Auth::user()->isReader()): ?>
			    <li>
				<a class="<?php echo e(Request::is('admin*') ? 'active' : '', false); ?>" href="#"><i class="fa fa-edit "></i>Admin Panel<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
				  <li><a class="<?php echo e(Request::is('admin') ? 'active' : '', false); ?>" href="<?php echo e(url('/admin'), false); ?>">General</a></li>
				  <li><a class="<?php echo e(Request::is('admin/users') ? 'active' : '', false); ?>" href="<?php echo e(url('/admin/users'), false); ?>">Users</a></li>
				  <li><a class="<?php echo e(Request::is('admin/transactions') ? 'active' : '', false); ?>" href="<?php echo e(url('/admin/transactions'), false); ?>">Transactions</a></li>
                  <li><a class="<?php echo e(Request::is('admin/withdrawals') ? 'active' : '', false); ?>" href="<?php echo e(url('/admin/withdrawals'), false); ?>">Withdrawal Requests</a></li>
                  <li><a class="<?php echo e(Request::is('admin/lotto_game') ? 'active' : '', false); ?>" href="<?php echo e(url('/admin/lotto_game'), false); ?>">Lotto Game</a></li>
                  <li><a class="<?php echo e(Request::is('admin/blog') ? 'active' : '', false); ?>" href="<?php echo e(url('/admin/blog'), false); ?>">Blog</a></li>
                  <li><a class="<?php echo e(Request::is('admin/messagebox') ? 'active' : '', false); ?>" href="<?php echo e(url('/admin/messagebox'), false); ?>">Support(<b><?php echo e(Auth::user()->received_messages_admin()->where('message_read', 0)->count(), false); ?></b>)</a></li>
				  <!--li><a class="<?php echo e(Request::is('admin/testimonies') ? 'active' : '', false); ?>" href="<?php echo e(url('/admin/testimonies'), false); ?>">Testimonies</a></li -->
				  <li><a class="<?php echo e(Request::is('admin/deleted') ? 'active' : '', false); ?>" href="<?php echo e(url('/admin/deleted'), false); ?>">Deleted Users</a></li>
				</ul>
			    </li>
			    <?php endif; ?>
                  <li class="sub-menu">
					<a href="<?php echo e(url('/logout'), false); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
					    <i class="fa fa-sign-out" aria-hidden="true"></i>
					    Logout
					</a>
					<form id="logout-form" action="<?php echo e(url('/logout'), false); ?>" method="POST" style="display: none;">
					    <?php echo e(csrf_field(), false); ?>

					</form>
				  </li>


              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
