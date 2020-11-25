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
						 <div class="panel panel-default">
							<div class="panel-heading">Statistics</div>
							<div class="panel-body">
								<div class="col-md-4 col-md-offset-4">
									<table class="table table-condensed">
										<tr><td><b>Total Users</b></td><td><b>{{ $users_count }}</b></td></tr>
										<tr class="danger"><td><b>Suspended Users</b></td><td><b>{{ $suspended_users_count }}</b></td></tr>
									</table>
								</div>
							</div>
						</div>
						<div class="panel panel-danger">
							<div class="panel-heading">Deleted Users</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-lg-3">
										<a class="btn btn-xs btn-danger" onclick="submitForm(this);" form-id="empty-trash-form" form-action="Permanently delete all users in trash"><i class="fa fa-trash-o"></i> Empty Trash</a></p><br />
										<form id="empty-trash-form" class="form" role="form" method="POST" action="{{ url('/empty_trash') }}">
											{{ csrf_field() }}
										</form>
									</div>
									<div class="col-lg-6 col-lg-offset-3">
									<form method="get" action="/admin/deleted">
									    <div class="input-group">
									      <input type="text" name="search" class="form-control" value="{{ app('request')->input('search') }}" placeholder="Name or Email">
									      <span class="input-group-btn">
										<button class="btn btn-sm btn-default" type="submit">Search</button>
									      </span>
									    </div>
									    </form>
									  </div>
									</div>
								</div>
								<div style="margin:10px;" class="table-responsive">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>S/No</th>
												<th>Name</th>
												<th>Email</th>
												<th>Role</th>
												<th>Withdrawal</th>

												@if(Auth::user()->isAdmin())
													<th>Action</th>
												@endif
											</tr>
										</thead>
										<tbody>
											@forelse($users as $index => $u)
											<tr @if($u->status_id == 4 || $u->status_id == 5) class="danger" @elseif($u->status_id == 1 && $u->role == 0) class="success" @endif>
												<td class="col-md-1"><b>{{ $index+1 }}</b></td>
												<td class="col-md-2"><a href="/admin/user/{{ $u->id }}">{{ $u->name }}</a></td>
												<td class="col-md-2">{{ $u->email }}</td>
												<td class="col-md-2">
													<select style="min-width:70px;" class="form-control" id="role_{{ $u->id }}">
													@if($u->role != 2)
														<option value="0" @if($u->role == 0) selected="selected" @endif>user</option>
														<option value="1" @if($u->role == 1) selected="selected" @endif>reader</option>
														<option value="2">admin</option>
													@else
														<option value="2">admin</option>
													@endif
													</select>
												</td>
												<td class="col-md-2" >

												</td>
												<td class="col-md-2">
												 {{ $u->withamt }}
												</td>
												@if(Auth::user()->isAdmin())
												<td class="col-md-4">
													<a onclick="submitForm(this);" form-id="restore-form-{{ $u->id }}" form-action="Restore this user" class="btn btn-sm btn-primary">
														Restore
													</a>
													<a onclick="submitForm(this);" form-id="delete-form-{{ $u->id }}" form-action="Permanently DELETE this user" class="btn btn-sm btn-default">
														<i style="color:red;" class="fa fa-trash-o" aria-hidden="true"></i>
													</a>
													<form id="restore-form-{{ $u->id }}" action="{{ url('/restore/delete_user') }}" method="POST" style="display: none;">
														{{ csrf_field() }}
														<input type="hidden" name="user" value="{{ $u->id }}" />
													</form>
													<form id="delete-form-{{ $u->id }}" action="{{ url('/permanent/delete_user') }}" method="POST" style="display: none;">
														{{ csrf_field() }}
														<input type="hidden" name="user" value="{{ $u->id }}" />
													</form>
												</td>
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
				                <br />
				        </div>
				            <!-- /. PAGE INNER  -->
				    </div>
              </div><!-- /row -->
          </div><!-- /col-lg-9 END SECTION MIDDLE -->
    </body>
@endsection
