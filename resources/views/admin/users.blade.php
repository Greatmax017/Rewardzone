@extends('layouts.admin_app')

@section('content')
<body>
	<div id="wrapper">
		@include('sections.d_header')
		@include('sections.sidebar')
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
              <div class="row">
                <div class="col-md-12">
					  <div class="col-lg-12">
                    	<div class="panel panel-default">
							<div class="panel-heading">Statistics</div>
							<div class="panel-body">
								<div class="col-md-4 col-md-offset-4">
									<table class="table table-condensed">
										<tr><td><b>Total Users</b></td><td><b>{{ $users_count }}</b></td></tr>
										<tr class="success"><td><b>Active Users</b></td><td><b>{{ $active_users_count }}</b></td></tr>
										<tr class="danger"><td><b>Suspended Users</b></td><td><b>{{ $suspended_users_count }}</b></td></tr>
									</table>
								</div>
							</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">Users</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-6 col-lg-offset-6">
								<form method="get" action="{{ url('/admin/users') }}">
								    <div class="input-group">
								      <input type="text" name="search" class="form-control" value="{{ app('request')->input('search') }}" placeholder="Name, Email, coupon or Phone">
								      <span class="input-group-btn">
									<button class="btn btn-sm btn-default" type="submit">Search</button>
								      </span>
								    </div>
								    </form>
								  </div>
								</div>
							</div>
							<div style="margin:10px; overflow-x:auto;" class="table-responsive">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>S/No</th>
											<th>UserName</th>
											<th>Email</th>
											<th>Role</th>
											<th>current cycle</th>
											<th>withdrawal</th>
											<th>Direct downline</th>
											<th>inderect downlines</th>
											<th>coupon used</th>
										</tr>
									</thead>
									<tbody>
										@forelse($users as $index => $u)
										<tr @if($u->suspended) class="danger" @elseif(!$u->activated) class="warning" @endif>
											<td class="col-md-1"><b>{{ $index+1 }}</b></td>
											<td class="col-md-2">
												<a href="{{ url('/admin/user/'.$u->id) }}">{{ $u->username }}</a>
											</td>
											<td class="col-md-2">{{ $u->email }}</td>
											<td class="col-md-1">


												</td>

											<td class="col-md-2">
												<strong>
													<?php
														$string = $u->coupon;
										        $firstCharacter = $string[0];

															if ( ctype_alpha($firstCharacter))

																echo "Cycle 2";
														else
																echo "Cycle 1";


															?>

											</td>
											<td class="col-md-2">
													<strong>{{$u->withamt}}</strong><br>
											</td>
											<td class="col-md-2">
												<strong>{{$u->referred_count() }}</strong><br>
											</td>
											<td class="col-md-2">
												<strong>{{$u->referred_count_second_gen() + $u->referred_count_third_gen()}}</strong><br>
											</td>
											<td class="col-md-2">
												<strong>{{$u->coupon }}</strong><br>
											</td>

										@if(Auth::user()->isAdmin())
										<td class="col-md-">
													<a onclick="submitUserForm(this);" id="{{ $u->id }}" class="btn btn-sm btn-primary">
														Save
													</a>
											</a>
											<a onclick="submitForm(this);" form-id="delete-form-{{ $u->id }}" form-action="Permanently DELETE this user" class="btn btn-sm btn-default">
												<i style="color:red;" class="fa fa-trash-o" aria-hidden="true"></i>
											</a>
											<form id="save-form-{{ $u->id }}" action="{{ url('/admin_save_user') }}" method="POST" style="display: none;">
												{{ csrf_field() }}
												<input type="hidden" name="user" value="{{ $u->id }}" />
											</form>
											<form id="delete-form-{{ $u->id }}" action="{{ url('/delete_user') }}" method="POST" style="display: none;">
															{{ csrf_field() }}
															<input type="hidden" name="user" value="{{ $u->id }}" />
														</form>
														@endif
									</tr>
										@empty
										<tr>
											<td colspan="2"><center><i>No users exist</i></center></td>
										</tr>
										@endforelse
									</tbody>
								</table>
								{{ $users->links() }}
							</div>
						</div>
                    </div>
                </div>
              </div><!-- /row -->
          </div><!-- /col-lg-9 END SECTION MIDDLE -->
    </body>
@endsection
