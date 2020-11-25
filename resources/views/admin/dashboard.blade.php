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
              		<div class="col-md-10 col-md-offset-1">
						 <div class="panel panel-danger">
							<div class="panel-heading">General</div>
							<div class="panel-body">
								<form id="profile-form" class="form" role="form" method="POST" action="{{ url('/admin_settings') }}">
								{{ csrf_field() }}

								<div class="form-group {{ $errors->has('bitcoin_wallet_id') ? ' has-error' : '' }}">
									<label class="control-label">Bitcoin Wallet Address:</label>
									<input type="text" class="form-control" name="bitcoin_wallet_id" value="{{ $settings->bitcoin_wallet_id }}" required autofocus>
									@if ($errors->has('bitcoin_wallet_id'))
									    <span class="label label-danger">
										<strong>{{ $errors->first('bitcoin_wallet_id') }}</strong>
									    </span>
									@endif
								</div>
								<div class="form-group {{ $errors->has('usd_bitcoin') ? ' has-error' : '' }}">
									<label class="control-label">USD to Bitcoin Current Rate:</label>
									<input type="text" class="form-control" name="usd_bitcoin" value="{{ $settings->usd_bitcoin }}" required autofocus>
									@if ($errors->has('usd_bitcoin'))
									    <span class="label label-danger">
										<strong>{{ $errors->first('usd_bitcoin') }}</strong>
									    </span>
									@endif
								</div>

								@if(Auth::user()->isAdmin())
									<div class="form-group">
									    <div class="col-sm-6 col-sm-offset-3">
										<center>
											<a onclick="submitForm(this);" form-id="profile-form" form-action="Save these changes" style="margin-top:20px;" type="submit" class="btn btn-danger">
											    Save
											</a><br />
										</center>
									    </div>
									</div>
								@endif
							    </form>
							</div>
						</div>
                    </div>
              </div><!-- /row -->
			  @if(Auth::user()->isAdmin())
			  <div class="row">
              		<div class="col-md-10 col-md-offset-1">
						 <div class="panel panel-primary">
							<div class="panel-heading">Notification
								<label class="label label-default pull-right">{{ $queue }} Left in queue</label>
							</div>
							<div class="panel-body">
								<form id="notify-form" class="form" role="form" method="POST" action="{{ url('/admin_notify') }}">
								{{ csrf_field() }}

								<div class="form-group {{ $errors->has('type') ? ' has-error' : '' }}">
									<label class="control-label">Notification Type:</label>
									<select class="form-control" name="type">
										<option value="">-- Select Type --</option>
										<option value="1">SMS Notification</option>
										<option value="2">Email Notification</option>
									</select>
									@if ($errors->has('type'))
									    <span class="label label-danger">
										<strong>{{ $errors->first('type') }}</strong>
									    </span>
									@endif
								</div>
								<div class="form-group {{ $errors->has('bitcoin_wallet_id') ? ' has-error' : '' }}">
									<label class="control-label">Message:</label>
									<textarea name="message"  rows="5" class="form-control"></textarea>
									@if ($errors->has('message'))
									    <span class="label label-danger">
										<strong>{{ $errors->first('message') }}</strong>
									    </span>
									@endif
								</div>


									<div class="form-group">
									    <div class="col-sm-6 col-sm-offset-3">
										<center>
											<a onclick="submitForm(this);" form-id="notify-form" form-action="Send notification to everyone" style="margin-top:20px;" type="submit" class="btn btn-primary">
											    Send
											</a><br />
										</center>
									    </div>
									</div>
							    </form>
							</div>
						</div>
                    </div>
              </div><!-- /row -->
			  @endif
          </div><!-- /col-lg-9 END SECTION MIDDLE -->
    </body>
@endsection
