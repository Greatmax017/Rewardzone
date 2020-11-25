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
                        <li class="breadcrumb-item"><a href="#">Rewardzone</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                      </ol>
                    </div>
                    <h4 class="page-title">Profile</h4>
                  </div>
                </div>
              </div>
              <!-- end page title end breadcrumb -->

              <div class="row">
               

              <div class="card-header">
                <div class="h5">Referral Bonus &#8377;{{ number_format($ref_bonus * 74, 2) }}</div>
                <div class="h5">Referred users {{ $ref_count }}</div>
                  <form method="post" action="{{ url('/get_bonus') }}">
                                    @csrf
                                    <button class="btn btn-sm btn-success" type="submit">Withdraw Bonus</button>
                                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive table-data">
                    <table id="transactionTable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                
                                <th scope="col">Name</>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                             @forelse($users as $m)
                            <tr>
                            <td>{{ $m->name }}</td>
                            <td>{{ $m->email }}</td>
                            <td>{{ $m->phone }}</td>
                                    </tr>
                                    @empty
                                
                            
                                <tr>
                                        <td colspan="3"><center><i>You have not referred anyone. share your referral link to get referral bonus</i></center></td>
                                    </tr>
                                    @endforelse
                                   <p>Refferal Link:  <br>
                                    <a href="{{ url('/register').'?ref='.Auth::user()->username }}" style="word-wrap:break-word;"><b>{{ url('/register').'?ref='.Auth::user()->username }}</b></a></p>
                               
                        </tbody>
                    </table>
                     {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>

             
                 
                          
            
                
        </div><br><br><br>
</section>
        
@include('sections.footer_2')
@endsection
