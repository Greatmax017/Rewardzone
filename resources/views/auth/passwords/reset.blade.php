@extends('layouts.app')

@section('content')
<!--about-->
<!--about-one-->
<section class="about-inner py-lg-4 py-md-3 py-sm-3 py-3">
    <!-- Inner Page Header serction end here -->
    <div class="container">
        <div class="section section-clients">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-md-8 offset-md-2">
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
                            <div class="card">
                                <div class="card-header">Reset Password</div>
                                <div class="card-body">
                                    @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                    @endif

                                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                                        {{ csrf_field() }}

                                        <input type="hidden" name="token" value="{{ $token }}" />

                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                                                @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="password" class="col-md-4 control-label">Password</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control" name="password" required>

                                                @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                                @if ($errors->has('password_confirmation'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Reset Password
                                                </button>
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
    </div>
</section>
@endsection
