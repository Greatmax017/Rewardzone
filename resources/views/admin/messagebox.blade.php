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
                <div class="col-md-10 col-md-offset-1">
					    <div class="panel panel-default">
							<div class="panel-heading">Inbox</div>
							<div class="panel-body">
								<div>
								<table class="table">
									<thead>
										<tr>
											<th>Sender</th>
											<th>Subject</th>
											<th>Date</th>
										</tr>
									</thead>
									<tbody>
										@forelse($messages as $m)
										<tr>

											<td><a href="/admin/message/{{ $m->id }}" @if($m->message_read == 0) style="font-weight:900;" @endif>{{ $m->sender_data->email or 'Support' }}</a></td>
											<td><a href="/admin/message/{{ $m->id }}" @if($m->message_read == 0) style="font-weight:900;" @endif>{{ $m->subject or '' }}</a></td>
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
						<div class="panel panel-default">
							<div class="panel-heading">Sent Messages</div>
							<div class="panel-body">
								<div>
								<table class="table">
									<thead>
										<tr>
											<th>To</th>
											<th>Subject</th>
											<th>Date</th>
										</tr>
									</thead>
									<tbody>
										@forelse($messages_sent as $m)
										<tr>

											<td><a href="/admin/message/{{ $m->id }}">{{ $m->receiver_data->email or 'support' }}</a></td>
											<td><a href="/admin/message/{{ $m->id }}">{{ $m->subject or '' }}</a></td>
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
								<div class="form-group">
								    <div style="margin-top:20px;" class="col-md-8 col-md-offset-2 text-center">
									<a href="/admin/message" class="btn btn-sm btn-primary">
									    New Message
									</a><br /><br />
								    </div>
								</div>
							</div>
						</div>
                    </div>
              </div><!-- /row -->
          </div><!-- /col-lg-9 END SECTION MIDDLE -->
    </body>
@endsection
