 <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
                    <i class="ion-close"></i>
                </button>

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="/dashboard" class="logo"><i class="mdi mdi-assistant"></i> Cash spring</a>
                        <!-- <a href="index.html" class="logo"><img src="assets/images/logo.png" height="24" alt="logo"></a> -->
                    </div>
                </div>

                <div class="sidebar-inner slimscrollleft">

                    <div id="sidebar-menu">
                        <ul>
                          

                            <li>
                                <a href="<?php echo e(url('/dashboard'), false); ?>" class="<?php echo e(url('/dashboard'), false); ?>; waves-effect">
                                    <i class="mdi mdi-airplay"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>
                             <li>
                                <a href="<?php echo e(url('/profile'), false); ?>" class="<?php echo e(Request::is('profile') ? 'active' : '', false); ?>; waves-effect">
                                    <i class="mdi mdi-account-circle m-r-5 text-muted"></i>
                                    <span> Profile </span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('/mytree'), false); ?>" class="<?php echo e(Request::is('mytree') ? 'active' : '', false); ?>; waves-effect">
                                    <i class="mdi mdi-pine-tree-box "></i>
                                    <span>My Downlines </span>
                                </a>
                            </li>

                             <li>
                                <a href="<?php echo e(url('/messagebox'), false); ?>" class="<?php echo e(Request::is('support') ? 'active' : '', false); ?>; waves-effect">
                                    <i class="mdi mdi-help-circle"></i>
                                    <span>Support</span>
                                </a>
                            </li>
                             <li>
                                <a href="<?php echo e(url('/logout'), false); ?>" class="<?php echo e(Request::is('dashboard') ? 'active' : '', false); ?>; waves-effect" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="mdi mdi-logout-variant "></i>
                                    <span>Logout  </span>
                                </a>
                                <form id="logout-form" action="<?php echo e(url('/logout'), false); ?>" method="POST" style="display: none;">
                                    <?php echo e(csrf_field(), false); ?>

                                </form>
                            </li>



                          	<?php if(Auth::user()->isAdmin() || Auth::user()->isReader()): ?>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-layers"></i> <span> Admin </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
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
                            
                    </div>
                    <div class="clearfix"></div>
                </div> <!-- end sidebarinner -->
            </div>
            <!-- Left Sidebar End -->