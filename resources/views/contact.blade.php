@extends('layouts.app')

@section('content')
<!-- Inner Page Header serction end here -->
	<div class="wrapper">
            <div class="section section-clients">
                <div class="container">
		    <div class="row">
		   	<div class="col-lg-12">
                <br>
				<div class="col-md-8 offset-md-2">
					@if (session('success-status'))
					    	<div class="alert alert-success">
						    <div class="container-fluid">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
							  </button>
						       <center>{{ session('success-status') }}</center>
						    </div>
						</div>
					@endif
					<div class="card">
							<div class="card-header">Contact Form</div>
							<div class="card-body">
								<form id="send-message" class="form" role="form" method="POST" action="{{ url('/contact_us') }}">
									{{ csrf_field() }}

									<div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
									   <label for="subject" class="control-label">Your Name:</label>
									   <input id="subject" type="text" class="form-control" placeholder="Full Name" name="name" value="{{ old('name') }}" required autofocus>
										@if ($errors->has('name'))
										    <span class="label label-danger">
											<strong>{{ $errors->first('name') }}</strong>
										    </span>
										@endif
									</div>


									<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
									   <label for="email" class="control-label">Your Email:</label>
									   <input id="email" type="email" class="form-control" placeholder="example@cashspring.com.ng" name="email" value="{{ old('email') }}" required>
										@if ($errors->has('email'))
										    <span class="label label-danger">
											<strong>{{ $errors->first('email') }}</strong>
										    </span>
										@endif
									</div>

									<div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
									   <label for="subject" class="control-label">Subject:</label>
									   <input id="subject" type="text" class="form-control" placeholder="Message Subject" name="subject" value="{{ old('subject') }}" required>
										@if ($errors->has('subject'))
										    <span class="label label-danger">
											<strong>{{ $errors->first('subject') }}</strong>
										    </span>
										@endif
									</div>

									<div class="form-group">
									    <label for="message" class="control-label">Message:</label><br />
									    <textarea class="form-control" rows="6" name="message">{{ old('message') }}</textarea>
									</div>

									<br />

									<div class="form-group">
									    <div style="margin-top:20px;" class="col-md-8 offset-md-2 text-center">
										<a onclick="submitForm(this);" form-id="send-message" form-action="send this message" class="btn btn-lg btn-primary">
										    Send Message
										</a><br /><br />
									    </div>
									</div>
								    </form>
							</div>
					</div>
				</div>
			</div>
		    </div>
		</div>
            </div>
@endsection
