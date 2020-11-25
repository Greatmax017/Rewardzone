<!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <h5 class="centered"><?php echo e(Auth::user()->name); ?></h5>
              	  	
                  <li>
                      <a class="<?php echo e(Request::is('dashboard') ? 'active' : ''); ?>"  href="/dashboard">
                          <i class="fa fa-desktop"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <li>
                      <a class="<?php echo e(Request::is('transaction_history') ? 'active' : ''); ?>"  href="/transaction_history">
                          <i class="fa fa-history"></i>
                          <span>Transaction History</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a class="<?php echo e(Request::is('messagebox') ? 'active' : ''); ?>" href="/messagebox" >
                          <i class="fa fa-envelope"></i>
                          <span>Support(<b><?php echo e(Auth::user()->received_messages()->count()); ?></b>)</span>
                      </a>
                      
                  </li>

                  <li class="sub-menu">
                      <a class="<?php echo e(Request::is('referred_bonus') ? 'active' : ''); ?>" href="/referred_bonus" >
                          <i class="fa fa-money"></i>
                          <span>Extra Bonus</span>
                      </a>
                      
                  </li>
                  <li class="sub-menu">
                      <a class="<?php echo e(Request::is('profile') ? 'active' : ''); ?>" href="/profile" >
                          <i class="fa fa-user"></i>
                          <span>Profile</span>
                      </a>

                  </li>
                  	<?php if(Auth::user()->isAdmin() || Auth::user()->isReader()): ?>
				    <li>
					<a class="<?php echo e(Request::is('admin*') ? 'active' : ''); ?>" href="#"><i class="fa fa-edit "></i>Admin Panel<span class="fa arrow"></span></a>
					<ul class="nav nav-second-level">
					  <li><a class="<?php echo e(Request::is('admin') ? 'active' : ''); ?>" href="/admin">General</a></li>
					  <li><a class="<?php echo e(Request::is('admin/categories') ? 'active' : ''); ?>" href="/admin/categories">Categories</a></li>
					  <li><a class="<?php echo e(Request::is('admin/users') ? 'active' : ''); ?>" href="/admin/users">Users</a></li>
					  <li><a class="<?php echo e(Request::is('admin/transactions') ? 'active' : ''); ?>" href="/admin/transactions">Transactions</a></li>
					  <li><a class="<?php echo e(Request::is('admin/testimonies') ? 'active' : ''); ?>" href="/admin/testimonies">Testimonies</a></li>
					  <li><a class="<?php echo e(Request::is('admin/deleted') ? 'active' : ''); ?>" href="/admin/deleted">Deleted Users</a></li>
					</ul>
				    </li>
				    <?php endif; ?>
                  <li class="sub-menu">
					<a href="<?php echo e(url('/logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
					    <i class="fa fa-sign-out" aria-hidden="true"></i>
					    Logout
					</a>
					<form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
					    <?php echo e(csrf_field()); ?>

					</form>
				  </li>
                

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->