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
                        @if(empty($post))
                        <div class="panel panel-default" style="color:black;">
                          <div class="panel-heading">New Article</div>
                          <div class="panel-body">
                              <form class="form-horizontal" method="post" action="/admin/blog" enctype="multipart/form-data">
                                  {{ csrf_field() }}
                                  <label for="show_on_home">Title of Article</label>
                                  <input type="text" class="form-control" name="title" value="{{ old('article') }}" placeholder="Enter title" required>
                                  <br>
                                  <textarea name="content" id="summernote">{!! old('content') !!}</textarea>
                                  <br>
                                  <button type="submit" class="btn btn-block btn-success">Save</button>
                              </form>
                		  </div>
                        @else
                        <div class="panel panel-default" style="color:black;">
                          <div class="panel-heading">Edit Article</div>
                          <div class="panel-body">
                              <form class="form-horizontal" method="post" action="/admin/blog/{{ $post->id }}" enctype="multipart/form-data">
                                  {{ csrf_field() }}
                                  <input type="hidden" name="_method" value="put" />
                                  <label>Title of Article</label>
                                  <input type="text" class="form-control" name="title" value="{{ $post->title }}" placeholder="Enter title" required>
                                  <br>
                                  <textarea name="content" id="summernote">{!! $post->content !!}</textarea>
                                  <br>
                                  <button type="submit" class="btn btn-block btn-success">Save</button>
                              </form>
                		  </div>
                        @endif
                    </div>
              </div><!-- /row -->
        </div><!-- /col-lg-9 END SECTION MIDDLE -->
    </body>
@endsection
