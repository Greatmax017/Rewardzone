@extends('layouts.app')

@section('content')


<!--about-->
<!-- register -->





<section class="register py-lg-4 py-md-3 py-sm-3 py-3">
    <div class="container py-lg-5 py-md-5 py-sm-4 py-3">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 text-center register-form">
                <div class="wls-register-form">
                    <h4><b>Create An Account</b></h4>
					<p><a href="/coupon" >Click here to get Coupon</a></p>


                    <br>
                    <div class="col-md-12">
                        @if (session('error-status'))
                                <div class="alert alert-danger">
                                <div class="container-fluid">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                                  </button>
                                  <b>Error:</b> {{ session('error-status') }}
                                </div>
                            </div>
                        @endif
                        @if (session('success-status'))
                                <div class="alert alert-success">
                                <div class="container-fluid">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                                  </button>
                                  {{ session('success-status') }}
                                </div>
                            </div>
                        @endif
                        <div class="card">
                                <div class="card-body">
                                    <form class="form" role="form" method="POST" action="/register">
    									{{ csrf_field() }}
										<label class="control-label">Sponsor's username(Optional)<span style="color:red;"></span></label>
    									<input type="text" class="form-control" placeholder="sponsor's username" value="@if($referrer != null){{ $referrer->username }}@endif" name="referrer">
										<div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
    										<label class="control-label">Username<span style="color:red;">*</span></label>
    										<input type="text" class="form-control" placeholder="Username" name="username" value="{{ old('username') }}" required autofocus>
    										@if ($errors->has('username'))
    										    <span class="badge badge-danger">
    											<strong>{{ $errors->first('username') }}</strong>
    										    </span>
    										@endif
    									</div>

    									<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
    										<label class="control-label">Full Name<span style="color:red;">*</span></label>
    										<input type="text" class="form-control" placeholder="Full Name" name="name" value="{{ old('name') }}" required autofocus>
    										@if ($errors->has('name'))
    										    <span class="badge badge-danger">
    											<strong>{{ $errors->first('name') }}</strong>
    										    </span>
    										@endif
    									</div>

    									<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    										<label class="control-label">Email address<span style="color:red;">*</span></label>
    										<input type="email" class="form-control" placeholder="email@example.com" name="email" value="{{ old('email') }}" required>
    										@if ($errors->has('email'))
    										    <span class="badge badge-danger">
    											<strong>{{ $errors->first('email') }}</strong>
    										    </span>
    										@endif
    									</div>

    									<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
    										<label class="control-label">Phone Number<span style="color:red;">*</span></label>
    										<input type="text" class="form-control" placeholder="Phone Number" value="{{ old('phone') }}" name="phone" required>
    										@if ($errors->has('phone'))
    										    <span class="badge badge-danger">
    											<strong>{{ $errors->first('phone') }}</strong>
    										    </span>
    										@endif
    									</div>
										<div class="form-group">
    										<label class="control-label">Bank(optional)<span style="color:red;"></span></label>
    										<input type="text" class="form-control" placeholder="Bank" name="bank" value="{{ old('bank') }}" >

    									</div>

                                        <div class="form-group{{ $errors->has('accountno') ? ' has-error' : '' }}">
    										<label class="control-label">Account Number/Wallet Address<span style="color:red;">*</span></label>
    										<input type="text" class="form-control" placeholder="Account number/Wallet Address" value="{{ old('accountno') }}" name="accountno">
    										@if ($errors->has('accountno'))
    										    <span class="badge badge-danger">
    											<strong>{{ $errors->first('accountno') }}</strong>
    										    </span>
    										@endif
    									</div>

										<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
											<label class="control-label">Password<span style="color:red;">*</span></label>
											<input type="password" class="form-control" placeholder="Password" name="password" required>
											@if ($errors->has('password'))
											    <span class="badge badge-danger">
												<strong>{{ $errors->first('password') }}</strong>
											    </span>
											@endif
										</div>

										<div class="form-group">
											<label class="control-label">Confirm password<span style="color:red;">*</span></label>
											<input type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required>
										</div>

										
										<div class="form-group ">

    										<input type="hidden" id="display" placeholder="Cycle" class="form-control" name="cycle" value="1" readonly >


    									</div>




										<div class="form-group ">

    										<input type="hidden" class="form-control" placeholder="" name="level" value="1" required autofocus>

    									</div>
											<?php

											$month = date('m');
											$day = date('d');
											$year = date('Y');

											$today = $year . '-' . $month . '-' . $day;
											?>


										<div class="form-group ">
    										<label class="control-label"><span style="color:red;"></span></label>
    										<input type="hidden" class="form-control" placeholder="" name="date" value="<?php echo $today; ?>" required autofocus readonly>

    									</div>



										<p>By Clicking the sign up button you agree to our Terms &amp; conditons</p>
    									<div class="form-group">
    										<center>
    											<button style="margin-top:20px;" type="submit" class="btn btn-lg btn-primary">
    											    Sign Up
    											</button>
    										</center>
    									</div>
										<p>Already have an account? <a href="/login">Login here</a>
    							    </form>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>





 <script type="text/javascript">
        document.getElementById("name").onkeyup = function() {
			 var letter = this.value.match(/^([A-Za-z])/);
			if(letter !== null) {

            document.getElementById("display").value = "2";
        }
		}
    </script>
</body>
</html>
<!--// register -->
@endsection
