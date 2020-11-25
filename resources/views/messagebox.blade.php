@extends('layouts.d_app')

@section('content')
@include('sections.sidebar_2')
<body>

	<div id="wrapper">
		
		
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
			                <center>
                @endif 
 




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
                        <li class="breadcrumb-item active">Support Messages</li>
                      </ol>
                    </div>
                    <h4 class="page-title">Support Messages</h4>
                  </div>
                </div>
              </div>
              <!-- end page title end breadcrumb -->

              <div class="row">
               

            <div class="col-md-10 offset-md-1">
                <div class="panel panel-primary">
                    <div class="panel-body">
                      


                        <table class="table">
                                <thead>
                                    <tr>
                                        <th>Subject</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($messages as $m)
                                    <tr>
                                        <td><a href="{{ url('/message/'.$m->id) }}" @if($m->message_read == 0) style="font-weight:900;" @endif>{{ $m->subject or '' }}</a></td>
                                        <td><span @if($m->message_read == 0) style="font-weight:900;" @endif>{{ $m->created_at->diffForHumans() }}</span> <br><small>{{ $m->created_at->toDayDateTimeString() }}</small></td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3"><center><i>No messages in your inbox</i></center></td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $messages->links() }}
                        </div>
                    </div>
                </div>
                </div>
                </div>
                <hr>

                 <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="panel panel-primary">
                    <div class="panel-body">
                      
                    <div class="card-header">Sent Messages
                        <a href="{{ url('/message') }}" class="btn btn-sm btn-info float-right">
                            <i class="fa fa-plus"></i> New Message
                        </a>
                    
                    <div class="card-body">
                        <div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Subject</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($messages_sent as $m)
                                    <tr>
                                        <td><a href="{{ url('/message/'.$m->id) }}">{{ $m->subject or '' }}</a></td>
                                        <td>{{ $m->created_at->toDayDateTimeString() }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3"><center><i>You have not sent any messages yet</i></center></td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
</div>


             
                 
                          
            
                
      </div>
                </div>
            </div>
           </div><!-- /row -->
    </div><!-- /col-lg-9 END SECTION MIDDLE -->
</section>
@include('sections.footer_2')
@endsection

