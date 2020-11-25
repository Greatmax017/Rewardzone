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
                        <br>
                    	<div class="panel panel-danger">
							<div class="panel-heading">Blog Articles</div>
							<div class="panel-body table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th>Title</th>
											<th>Thumbnail</th>
                                            <th>Created</th>
                                            <th>Viewed</th>
                                            <th>Action</th>
										</tr>
									</thead>
									<tbody>
										@forelse($posts as $c)
										<tr>
											<td class="col-md-2"><b>{{ $c->title }}</b></td>
											<td class="col-md-2"><b>@if(!is_null($c->thumbnail))<a href="{{ $c->thumbnail }}" target="_blank">View</a>@endif</b></td>
                                            <td class="col-md-2"><b>{{ $c->created_at->toDayDateTimeString() }}</b></td>
                                            <td class="col-md-2"><b>{{ $c->view_count }}</b></td>
											<td class="col-md-2">
                                                @if(Auth::user()->isAdmin())
                                                <a onclick="submitForm(this);" form-id="post-delete-form-{{ $c->id }}" form-action="delete this article" class="btn btn-sm btn-danger">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                </a>
                                                <a href="/admin/blog/{{ $c->id }}/edit" class="btn btn-sm btn-primary">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </a>
                                                <form id="post-delete-form-{{ $c->id }}" class="form" role="form" method="POST" action="/admin/blog/{{ $c->id }}">
													{{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="delete" />
													<input type="hidden" value="{{ $c->id }}" name="post" />
												</form>
                                                @endif

											</td>
										</tr>
										@empty
										<tr>
											<td colspan="5"><center><i>No Articles Created yet</i></center></td>
										</tr>
										@endforelse
									</tbody>
								</table>
								@if(Auth::user()->isAdmin())
								<div class="form-group">
									<center>
										<a type="button" href="/admin/blog/create" class="btn btn-danger">Add New Article</a>
									</center>
								</div>
								@endif
							</div>
						</div>
                    </div>
              </div><!-- /row -->
        </div><!-- /col-lg-9 END SECTION MIDDLE -->
    </body>
@endsection
