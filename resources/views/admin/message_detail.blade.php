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
              <div class="row">
				<div class="col-md-8 col-md-offset-2">
					@if (session('error-status'))
					    	<div class="alert alert-danger">
						    <div class="container-fluid">
							  <div class="alert-icon">
							    <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
							  </div>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
							  </button>
						      <b>Error:</b> {{ session('error-status') }}
						    </div>
						</div>
					@endif
					<div class="panel panel-default">
							<div class="panel-heading">Message Detail</div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-condensed">
										<tbody>
											<tr><td><b>Sender Username</b></td><td>{{ $message->sender_data->username or 'Support' }}<br /></td></tr>
											<tr><td><b>Sender Email:</b></td><td><b><a href="{{ url('/admin/user/'.$message->sender) }}">{{ $message->sender_data->email or 'support@Cashspring.com.ng' }}</a> @if($message->sender != 0) <a href="/admin/message/reply/{{ $message->id }}" class="btn btn-xs btn-primary">Reply</a> @endif</b></td></tr>
											<tr><td><b>Receiver Name</b></td><td> {{ $message->receiver_data->name or 'Support' }}<br /></td></tr>
											<tr><td><b>Receiver Email:</b></td><td><b><a href="{{ url('/admin/user/'.$message->receiver) }}">{{ $message->receiver_data->email or 'support@Cashspring.com.ng' }}</a></b></td></tr>
											<tr><td><b>Subject:</b></td><td><b>{{ $message->subject or '' }}</b></td></tr>
										</tbody>
									</table>
								</div>
								<p>{{ $message->message }}</p>
								@if($message->attachment != null)
									<b>Attachment:</b>
									<img class="img-responsive" src="/{{ $message->attachment }}" alt="Message Attachment" />
								@endif
								<div class="form-group">
								    <div style="margin-top:20px;" class="col-md-8 col-md-offset-2 text-center">
									<a href="{{ url()->previous() }}" class="btn btn-sm btn-primary">
									    Return back
									</a><br /><br />
								    </div>
								</div>
							</div>
					</div>
				</div>
			</div>
      </div><!-- /col-lg-9 END SECTION MIDDLE -->
</body>
@endsection
