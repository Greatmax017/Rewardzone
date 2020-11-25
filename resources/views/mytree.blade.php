@extends('layouts.d_app')

@section('content')
<body>

	<div id="wrapper">
		
		@include('sections.sidebar_2')
	<!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          		@if (session('error-status'))
					<div class="alert alert-danger alert-dismissable">
					    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					    <div class="container-fluid">
					      <center><b>Error:</b> {{ session('error-status') }}</center>
					    </div>
					</div>
				@endif
				@if (session('success-status'))
					<div class="alert alert-success alert-dismissable">
					    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					    <div class="container-fluid">
						<center>{{ session('success-status') }}</center>
					    </div>
					</div>
				@endif
            


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
                   class="{{ Request::is('new_message') ? 'active' : '' }}"  href="{{ url('/messagebox') }}"
                    
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
                      <h5>Welcome</h5>
                    </div>
                    <a class="dropdown-item" href="{{ url('/profile') }}"
                      ><i class="mdi mdi-account-circle m-r-5 text-muted"></i>
                      Profile</a
                    >
                    
                   
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
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
                        <li class="breadcrumb-item active">Downlines</li>
                      </ol>
                    </div>
                    <h4 class="page-title">My Downlines</h4>
                  </div>
                </div>
              </div>
              <!-- end page title end breadcrumb -->

              <div class="row">
               

              <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Referral/Affiliate</div>
                    <div class="card-body table-responsive">
                        <div>
                            <b>Direct Downlines:</b> ({{ auth::user()->referred_count()}})<br>
                  <b>Total 2nd gen downlines:</b> ({{ auth::user()->referred_count_second_gen() }})<br>
                   <b>Total 3rd downlines:</b> ({{ auth::user()->referred_count_third_gen() }})<br>
									 <b>Total:</b> ({{ auth::user()->referred_count() + auth::user()->referred_count_second_gen()  +  auth::user()->referred_count_third_gen() }})<br>
                            <br>
                            <br>

													</div>


                            <table class="table">
                                <thead>
                                    <tr>
                                    <th>User</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                         <th>Cycle</th>
                                        <th>direct</th>
                                        <th>Indirect</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($users as $m)
                                    <tr>
                                        <td>{{ $m->username }}</td>
                                        <td>{{ $m->email }}</td>
                                        <td>{{ $m->phone }}</td>
                                        <td>{{ $m->cycle }}</td>
                                        <td>{{ $m->referred_count() }}</td>
                                        <td>{{ $m->referred_count_second_gen()}}</td>



                                    </tr>


                                    @empty
                                    <tr>
                                        <td colspan="3"><center><i>You have not referred anyone. share your referral link to get referral bonus</i></center></td>
                                    </tr>
                                    @endforelse
																		<tr>
																				<td colspan="3"><center><i>Swipe left for more>></i></center></td>
																		</tr>
                                </tbody>

                            </table>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div><br><br><br><br><br><br>
                            {{ $users->links() }}
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="alert">
                                        <p class="text-center">Your Referral Link is
                                            <a href="{{ url('/register').'?ref='.Auth::user()->username}}" style="word-wrap:break-word;"><b>{{ url('/register').'?ref='.Auth::user()->username }}</b></a>
                                        </p>
                                        <center>
                                            <br>
                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ url('/register').'?ref='.Auth::user()->username }}" class="btn btn-sm btn-primary"><i class="fab fa-facebook"></i> Share on Facebook</a>
                                            <a href="whatsapp://send?text={{ url('/register').'?ref='.Auth::user()->username }}&text=Register on Cashspring" class="btn btn-sm btn-success"><i class="fab fa-whatsapp"></i> Share on Whatsapp</a>
                                            <a href="https://t.me/share/url?url={{ url('/register').'?ref='.Auth::user()->username }}&text=Register on Cashspring" class="btn btn-sm btn-primary"><i class="fab fa-telegram"></i> Share on Telegram</a>
                                        </center>
                                    </div>
                                    </div>
                                    </div>
                                </div class="col-lg-12">

             
                 
                          
            
                
        </div><br><br><br>
        
@include('sections.footer_2')
@endsection
