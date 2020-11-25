 <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
                    <i class="ion-close"></i>
                </button>

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="/dashboard" class="logo"><i class="mdi mdi-assistant"></i> Reward Zone</a>
                        <!-- <a href="index.html" class="logo"><img src="assets/images/logo.png" height="24" alt="logo"></a> -->
                    </div>
                </div>

                <div class="sidebar-inner slimscrollleft">

                    <div id="sidebar-menu">
                        <ul>
                          

                            <li>
                                <a href="{{ url('/dashboard') }}" class="{{ url('/dashboard') }}; waves-effect">
                                    <i class="mdi mdi-airplay"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>
                             <li>
                                <a href="#" a href="" data-toggle="modal" data-target="#modalRegisterForm" class="">
                                    <i class="mdi mdi-cash"></i>
                                    <span> Add Investment </span>
                                </a>
                            </li>
                             <li>
                                <a href="{{ url('/profile') }}" class="{{ Request::is('profile') ? 'active' : '' }}; waves-effect">
                                    <i class="mdi mdi-account-circle m-r-5 text-muted"></i>
                                    <span> Profile </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/referral') }}" class="{{ Request::is('referal') ? 'active' : '' }}; waves-effect">
                                    <i class="mdi mdi-pine-tree-box "></i>
                                    <span>Referral Bonus</span>
                                </a>
                            </li>

                             <li>
                                <a href="{{ url('/messagebox') }}" class="{{ Request::is('support') ? 'active' : '' }}; waves-effect">
                                    <i class="mdi mdi-help-circle"></i>
                                    <span>Support</span>
                                </a>
                            </li>
                             <li>
                                <a href="{{ url('/logout') }}" class="{{ Request::is('dashboard') ? 'active' : '' }}; waves-effect" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="mdi mdi-logout-variant "></i>
                                    <span>Logout  </span>
                                </a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>



                          	@if(Auth::user()->isAdmin() || Auth::user()->isReader())
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-layers"></i> <span> Admin </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="nav nav-second-level">
				  <li><a class="{{ Request::is('admin') ? 'active' : '' }}" href="{{ url('/admin') }}">General</a></li>
				  <li><a class="{{ Request::is('admin/users') ? 'active' : '' }}" href="{{ url('/admin/users') }}">Users</a></li>
          <li><a class="{{ Request::is('admin/coupon') ? 'active' : '' }}" href="{{ url('/admin/admincoupon') }}">Coupon</a></li>
				  <li><a class="{{ Request::is('admin/withdrawals') ? 'active' : '' }}" href="{{ url('/admin/withdrawals') }}">Withdrawals</a></li>
          <li><a class="{{ Request::is('admin/withdrawn') ? 'active' : '' }}" href="{{ url('/admin/withdrawn') }}">Withdrawn</a></li>
                  <li><a class="{{ Request::is('admin/blog') ? 'active' : '' }}" href="{{ url('/admin/blog') }}">Blog</a></li>
                      <li><a class="{{ Request::is('admin/deleted') ? 'active' : '' }}" href="{{ url('/admin/deleted') }}">Deleted</a></li>
                  <li><a class="{{ Request::is('admin/messagebox') ? 'active' : '' }}" href="{{ url('/admin/messagebox') }}">Support(<b>{{ Auth::user()->received_messages_admin()->where('message_read', 0)->count() }}</b>)</a></li>
				</ul>
                            </li>
			                    @endif
                            
                    </div>
                    <div class="clearfix"></div>
                </div> <!-- end sidebarinner -->
            </div>
            <!-- Left Sidebar End -->