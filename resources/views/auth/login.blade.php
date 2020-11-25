@extends('layouts.app')

@section('content')
<!-- //short-->
<!--about-->
<!-- register -->

<section class="register py-lg-4 py-md-3 py-sm-3 py-3">
    <div class="container py-lg-5 py-md-5 py-sm-4 py-3">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 text-center register-form">
                <div class="wls-register-form">
                    <h4>Sign In</h4>
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
                                    <form class="form" role="form" method="POST" action="{{ url('/login') }}">
                                        {{ csrf_field() }}

                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                           <label for="email" class="control-label">E-Mail Address</label>
                                           <input id="email" type="email" class="form-control" placeholder="email@example.com" name="email" value="{{ old('email') }}" required autofocus>
                                            @if ($errors->has('email'))
                                                <span class="label label-danger">
                                                <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="password" class="control-label">Password</label>
                                            <input id="password" type="password" placeholder="Password" class="form-control" name="password" required>
                                            @if ($errors->has('password'))
                                            <span class="label label-danger">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-6 offset-sm-3">
                                            <div class="checkbox text-center">
                                                <label>
                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                                Remember Me
                                                </label>
                                            </div>
                                            </div>
                                        </div>

                                        <div class="form-group text-center">
                                            <div style="margin-top:20px;">
                                            <button type="submit" class="btn btn-lg btn-primary">
                                                Sign In
                                            </button><br /><br />
                                            <a href="{{ url('/password/reset') }}">
                                                Forgot Your Password?
                                            </a><br /><br />
                                            Do not have an account? <a href="{{ url('/register') }}">
                                                Create an account
                                            </a>
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
</section>
<!--// register -->
@endsection
