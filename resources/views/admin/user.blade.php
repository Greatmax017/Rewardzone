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
              		<div class="col-md-8 col-md-offset-2">
                    	<div class="panel panel-default">
							<div class="panel-heading">User Detail</div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table">
										<tbody>
												<tr><td><b>Username</b></td><td> {{ $user->username or '' }}<br /></td></tr>
													<tr><td><b>Upline</b></td><td><a href="{{ url('/admin/user/'.$user->referrer_id) }}"> {{ $user->referrer_id or '' }}</a><br /></td></tr>
											<tr><td><b>Name</b></td><td> {{ $user->name or '' }}<br /></td></tr>
											<tr><td><b>Email:</b></td><td><b>{{ $user->email }}</b></tr>
													<tr><td><b>Cycle:</b></td><td><b>
													<?php
														$string = $user->coupon;
										        $firstCharacter = $string[0];

															if ( ctype_alpha($firstCharacter))

																echo "Cycle 2";
														else
																echo "Cycle";


															?>
													</b></tr>
															<tr><td><b>Coupon:</b></td><td><b>{{ $user->coupon }}</b></tr>
														<tr><td><b>Bank:</b></td><td><b>{{ $user->bank }}</b></tr>
															<tr><td><b>Account Number:</b></td><td><b>{{ $user->accountno }}</b>
																<tr><td><b>Phone:</b></td><td><b>{{ $user->phone or '' }}</b></td></tr>
																	<tr><td><b>Registered on:</b></td><td><b>{{ $user->created_at or '' }}</b></td></tr>
																	<tr><td><b>Last login:</b></td><td><b>{{ $user->updated_at or '' }}</b></td></tr>
												@if(!$user->suspended)
												<a href="/admin/user/{{ $user->id }}/suspend" class="btn btn-xs btn-danger">Suspend</a>
												@else
												<a  href="/admin/user/{{ $user->id }}/release" class="btn btn-xs btn-success">UnSuspend</a>
												@endif
											</td></tr>
											<tr><td><b>Direct Referral:</b></td><td><b>{{ $user->referred_count() }}</b></td></tr>
											<tr><td><b>Total Downlines:</b></td><td><b>{{ $user->referred_count()  + $user->referred_count_second_gen() + $user->referred_count_third_gen()}}</b></td></tr>


										</tbody>
									</table>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									    <div style="margin-top:20px;" class="col-md-6 col-md-offset-5 text-center">
										<a href="/admin/transactions?search={{ $user->email }}" class="btn btn-sm btn-primary">
										    View Transactions
										</a><br /><br />
									    </div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									    <div style="margin-top:20px;" class="col-md-6 text-center">
										<a href="{{ url()->previous() }}" class="btn btn-sm btn-primary">
										    Return back
										</a><br /><br />
									    </div>
									</div>
								</div>
							</div>
						</div>
							<div class="panel panel-default">
								<div class="panel-heading">Referred Users</div>
								<div class="panel-body">
									<div style="margin:10px; overflow-x:auto;" class="table-responsive">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>S/No</th>
													<th>Name</th>
													<th>Cycle</th>
													<th>downlines</th>
													<th>Downline 2</th>


													@if(Auth::user()->isAdmin())
														<th>Action</th>
													@endif
												</tr>
											</thead>
											<tbody>
												@forelse($users as $index => $u)
												<tr @if($u->suspended) class="danger" @endif>
													<td class="col-md-1"><b>{{ $index+1 }}</b></td>
													<td class="col-md-2"><a href="{{ url('/admin/user/'.$u->id) }}">{{ $u->username }}</a></td>
													<td class="col-md-2"><?php
														$string = $user->coupon;
										        $firstCharacter = $string[0];

															if ( ctype_alpha($firstCharacter))

																echo "Cycle 2";
														else
																echo "Cycle 1";


															?></td>
													<td class="col-md-2">{{ $u->referred_count() }}</td>
													<td class="col-md-1">{{ $u->referred_count_second_gen() }}</td>


													@if(Auth::user()->isAdmin())
													<td class="col-md-1">
														<a onclick="submitUserForm(this);" id="{{ $u->id }}" class="btn btn-sm btn-primary">
															Save
														</a>
														@if(!$u->isAdmin() && ($u->status_id == 4 || $u->status_id == 5))
														<a onclick="submitForm(this);" form-id="delete-form-{{ $u->id }}" form-action="DELETE this user" class="btn btn-sm btn-primary">
															<i style="color:red;" class="fa fa-trash" aria-hidden="true"></i>
														</a>
														<form id="delete-form-{{ $u->id }}" action="{{ url('/delete_user') }}" method="POST" style="display: none;">
															{{ csrf_field() }}
															<input type="hidden" name="user" value="{{ $u->id }}" />
														</form>
														@endif
													</td>
													@endif
												</tr>
												@empty
												<tr>
													<td colspan="6"><center><i>No users exist</i></center></td>
												</tr>
												@endforelse
											</tbody>
										</table>
										{{ $users->links() }}
									</div>
								</div>
					</div>
              </div><!-- /row -->
          </div><!-- /col-lg-9 END SECTION MIDDLE -->
    </body>
@endsection
