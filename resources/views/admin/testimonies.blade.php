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
						<div class="panel panel-danger">
							<div class="panel-heading">Testimonies</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-sm-6 col-sm-offset-6">
									    <div class="input-group">
									      <input type="text" id="search" class="form-control" value="{{ app('request')->input('search') }}" placeholder="Name or testimony">
									      <span class="input-group-btn">
											<button onclick="searchTable();" class="btn btn-sm btn-default" type="submit">Search</button>
									      </span>
									    </div>
									  </div>
									</div>
								</div>
								<div style="margin:10px; overflow-x:auto;" class="table-responsive">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>S/No</th>
												<th>Name</th>
												<th>Testimony</th>
												<th>Status</th>
												@if(Auth::user()->isAdmin())
													<th>Action</th>
												@endif
											</tr>
										</thead>
										<tbody>
											@forelse($testimonies as $index => $t)
											<tr>
												<td class="col-md-1"><b>{{ $index+1 }}</b></td>
												<td class="col-md-2">{{ $t->name }}</td>
												<td class="col-md-5">{{ $t->testimony }}</td>
												<td class="col-md-2">
													<select style="min-width:100px;" class="form-control" id="enabled_{{ $t->id }}">
														<option value="0" @if($t->enabled == 0) selected="selected" @endif>Disabled</option>
														<option value="1" @if($t->enabled == 1) selected="selected" @endif>Enabled</option>
													</select>
												</td>
												@if(Auth::user()->isAdmin())
												<td class="col-md-2">
													<a onclick="submitTestimonyForm(this);" id="{{ $t->id }}" class="btn btn-sm btn-primary">
														Save
													</a>
													<a onclick="submitForm(this);" form-id="delete-form-{{ $t->id }}" form-action="DELETE this testimony" class="btn btn-sm btn-primary">
														<i style="color:red;" class="fa fa-trash-o" aria-hidden="true"></i>
													</a>
													<form id="delete-form-{{ $t->id }}" action="{{ url('/admin_delete_testimony') }}" method="POST" style="display: none;">
														{{ csrf_field() }}
														<input type="hidden" name="testimony" value="{{ $t->id }}" />
													</form>												
												</td>
												@endif
											</tr>
											@empty
											<tr>
												<td colspan="5"><center><i>No testimony exist</i></center></td>
											</tr>
											@endforelse
										</tbody>
									</table>
									{{ $testimonies->links() }}
								</div>
								<form id="testimony-form" action="{{ url('/admin_save_testimony') }}" method="POST" style="display:none">
									{{ csrf_field() }}
									<input type="hidden" name="testimony" value="0" />
									<input type="hidden" name="enabled" value="0" />
								</form>
							</div>	
                    </div>  
                </div>
              </div><!-- /row -->					
          </div><!-- /col-lg-9 END SECTION MIDDLE -->
    </body>
@endsection