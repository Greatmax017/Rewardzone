<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reward Zone | @if(Request::segment(1) == '') Home @else {{ ucfirst(Request::segment(1)) }} @endif</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Bitcoin, trading, gain" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Rewardzone Multi-level Marketing Company." />
    <meta name="theme-color" content="#ff3c41" />
    <script>
    addEventListener("load", function () {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <!--// Meta tag Keywords -->

    <!-- Custom-Files -->
    <link rel="stylesheet" href="{{ url('/css/bootstrap.css') }}">
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="{{ url('/css/style.css') }}" type="text/css" media="all" />

    <link rel="stylesheet" href="{{ url('/asset/css/vex/css/vex.css') }}" />
    <link rel="stylesheet" href="{{ url('/asset/css/vex/css/vex-theme-os.css') }}" />
    <link href="{{ url('/asset/css/vex/css/vex-theme-wireframe.css') }}" rel="stylesheet" />
    <!-- Style-CSS -->
    <link rel="stylesheet" href="{{ url('/css/fontawesome-all.css') }}">
    <!-- Font-Awesome-Icons-CSS -->
    <!-- //Custom-Files -->

    <!-- Web-Fonts -->
    <link href="https://fonts.googleapis.com.ng/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com.ng/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
    <!-- //Web-Fonts -->
</head>

<body>
    <!-- banner -->
    <div class="bannerbg-w3l {{ Request::is('/') ? '':'bannerbg-w3l-inner' }}">
        <!-- header -->
        <header>
            <div class="header_topw3layouts_bar">
                <div class="container">
                    <!-- header-top -->
                    <div class="row border-bottom py-lg-4 py-3">
                        <div class="col-md-8 col-lg-6 header_agileits_left">
                            <ul>

                                        <i class="fas fa-envelope mr-2"></i>
                                        <a href="mailto:support@RewardZone.com.ng">support@RewardZone.com.ng</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4 col-lg-6 header_right text-center mt-lg-0 mt-2">
                                <div class="row">
                                    @guest
                                    <div class="col-6 header-loginw3ls text-lg-right text-center">
                                        <a href="#" class="log" data-toggle="modal" data-target="#exampleModalCenter1">
                                            <i class="fas fa-user mr-2"></i> Login
                                        </a>
                                    </div>
                                    <div class="col-6 header-loginw3ls">
                                        <a href="#" class="log" data-toggle="modal" data-target="#exampleModalCenter2">
                                            <i class="fas fa-key mr-2"></i> Register
                                        </a>
                                    </div>
                                    @else
                                    <div class="col-6 header-loginw3ls text-lg-right text-center">
                                        <a href="{{ url('/dashboard') }}" class="log">
                                            <i class="fas fa-user mr-2"></i> Welcome, {{ strlen(Auth::user()->name) > 12 ? substr(Auth::user()->name,0, 12).'...' : Auth::user()->name }}
                                        </a>
                                    </div>
                                    <div class="col-6 header-loginw3ls">
                                        <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="log">
                                            <i class="fas fa-lock mr-2"></i> Logout
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                    <div class="col-6 header-loginw3ls text-lg-right text-center">
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                        </div>
                                    </div>
                                    @endauth
                                    <!-- //social icons -->

                                </div>
                            </div>
                        </div>
                        <!--// header-top -->

                        <!-- navigation -->
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                            <a class="navbar-brand" href="{{ url('/') }}">Reward Zone
                                <span>Fastest MLM</span>
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item {{ Request::is('/') ? 'active':'' }}">
                                    <a class="nav-link" href="{{ url('/') }}">Home
                                        <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                                
                                
                                <li class="nav-item mx-xl-2 mx-lg-1 my-lg-0 my-2">
                                    <a class="nav-link scroll" href="{{ url('/') }}/#pricings">Packages</a>
                                </li>
                                <li class="nav-item {{ Request::is('contact') ? 'active':'' }}">
                                    <a class="nav-link" href="{{ url('/contact') }}">Contact Us</a>
                                </li>
                                @auth
                                <li class="nav-item dropdown {{ Request::is('dashboard') ? 'active':'' }}">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Account
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ url('/dashboard') }}"><i class="fa fa-chart-line"></i> Dashboard</a>
                                        <a class="dropdown-item" href="{{ url('/profile') }}"><i class="fa fa-user"></i> My Profile</a>
                                        <a class="dropdown-item" href="{{ url('/messagebox') }}"><i class="fa fa-life-ring"></i> Support</a>

                                        @if(Auth::user()->isAdmin())
                                        <a class="dropdown-item" href="{{ url('/admin') }}"><i class="fa fa-chart-line"></i> Admin Panel</a>
                                        @endif
                                    </div>
                                </li>
                                @endauth
                            </ul>
                    </div>
                </nav>
                <!-- //navigation -->
            </div>
        </div>
    </header>
    <!-- //header -->
    @if(Request::is('/'))
    <!-- banner text -->
    <div class="banner-text-agile">
        <div class="container">
            <div class="banner-w3lstexts text-white text-center">
                <h1>Welcome to Reward Zone</h1>
                <h4 class="text-uppercase mt-md-3 mt-2 mb-md-4 mb-3">Fastest MLM Company</h4>
                <p class="text-white"></p>
                <a href="{{ url('/about') }}" class="banner-button btn mt-md-5 mt-4">Know More</a>
            </div>
        </div>
    </div>
    <!-- //banner text -->
    @else
    <!-- banner-text -->
    <div class="banner-w3ltext about-w3bnr">
        <div class="container">
            <h1 class="text-white text-center">
                <a href="{{ url('/') }}">Home</a> / @if(Auth::check() && !Request::is('dashboard')) <a href="{{ url('/dashboard') }}">Dashboard</a> / @endif {{ ucfirst(Request::segment(1)) }}
            </h1>
        </div>
    </div>
    <!-- //banner-text -->
    @endif
</div>
@guest
<!-- login -->
<div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="login px-4 mx-auto mw-100">
                    <h5 class="text-center mb-4">Login Now</h5>
                    <form action="{{ url('/login') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Enter Email" required="">
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter Password" required="">
                        </div>
                        <button type="submit" class="btn btn-primary submit mb-4">Login</button>
                        <p class="text-center pb-4">
                            <a href="{{ url('/password/reset') }}">Forgot your password?</a>
                        </p>
                        <p class="text-center pb-4">
                            Don't have an account?
                            <a href="#" data-toggle="modal" data-target="#exampleModalCenter2">Create one now</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //login -->
<!-- register -->
<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="login px-4 mx-auto mw-100">
                    <h5 class="text-center mb-4">Register Now</h5>
                   <form class="form" role="form" method="POST" action="#">
    									{{ csrf_field() }}
										<label class="control-label">Sponsor's username(optional)<span style="color:red;"></span></label>
    									<input type="text" class="form-control" placeholder="sponsor's username" value="system" name="referrer">
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
    										<input type="text" class="form-control" placeholder="Bank" name="bank" value="{{ old('bank') }}" required autofocus>

    									</div>

                                        <div class="form-group{{ $errors->has('accountno') ? ' has-error' : '' }}">
    										<label class="control-label">Account Number/Wallet Address<span style="color:red;">*</span></label>
    										<input type="text" class="form-control" placeholder="Account number" value="{{ old('accountno') }}" name="accountno">
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
<!--//register-->
@endauth
<!-- //banner -->

@yield('content')

@if(Request::is('/'))
<!-- footer top -->
<div class="footer-top py-5 text-center">
    <div class="container py-xl-5 py-lg-3">
        <h2 class="text-white mb-4">Have any questions?</h2>
        <h5 class="text-white mb-sm-5 mb-4 pb-sm-5 pb-4">Contact Us</h5>
        <i class="fas fa-map-marker-alt"></i>
    </div>
</div>
<!-- //footer top -->
@endif

<!-- footer -->
<div class="footer py-5 text-center">
    <div class="container py-xl-5 py-lg-3">
        <div class="address row mb-4">
            <div class="col-lg-4 address-grid">
                <div class="row address-info">
                    <div class="col-md-3 address-left text-center">
                        <i class="far fa-envelope"></i>
                    </div>
                    <div class="col-md-9 address-right text-left">
                        <h6 class="ad-info text-uppercase mb-2">Email</h6>
                        <p>
                            <a href="mailto:support@RewardZone.com.ng">support@RewardZone.com.ng</a>
                        </p>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 address-grid my-lg-0 my-4">
                <div class="row address-info">
                    <div class="col-md-3 address-left text-center">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                     <p>+234 904 620 9552</p>
                </div>
            </div>
            <div class="col-lg-4 address-grid">
                <div class="row address-info">
                    <div class="col-md-3 address-left text-center">
                        <i class="far fa-map"></i>
                       
                    </div>
                    <div class="col-md-9 address-right text-left">
                        <h6 class="ad-info text-uppercase mb-2">Address</h6>
                        <p>2207 Lakeside Drive, Orlando, </p>
                        <p> 32803 Florida, US,</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- social icons footer -->
        <div class="w3social-icons-footer text-center pt-sm-5 pt-3">
            <ul>
                <li>
                    <a href="#" class="rounded-circle">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </li>
                <li class="px-2">
                    <a href="#" class="rounded-circle">
                        <i class="fab fa-google-plus-g"></i>
                    </a>
                </li>
                <li>
                    <a href="#" class="rounded-circle">
                        <i class="fab fa-telegram"></i>
                    </a>
                </li>
            </ul>
        </div>
        <!-- //social icons footer -->
    </div>
</div>
<!-- footer -->


<!-- copyright -->
<div class="copy_right py-4 text-center">
    <p class="text-white">© 2020 Reward Zone. All rights reserved
    </p>
</div>
<!-- //copyright -->


<!-- Js files -->
<!-- JavaScript -->
<script src="{{ url('/js/jquery-2.2.3.min.js') }}"></script>
<!-- Default-JavaScript-File -->
<script src="{{ url('/js/bootstrap.js') }}"></script>
<!-- Necessary-JavaScript-File-For-Bootstrap -->

<script src="{{ url('/asset/js/vex/js/vex.com.ngbined.min.js') }}"></script>
<script>vex.defaultOptions.className = 'vex-theme-os'</script>

<!-- flexSlider (for testimonials) -->
<link rel="stylesheet" href="{{ url('/css/flexslider.css') }}" type="text/css" media="screen" property="" />
<script defer src="{{ url('/js/jquery.flexslider.js') }}"></script>
<script>
$(window).load(function () {
    $('.flexslider').flexslider({
        animation: "slide",
        start: function (slider) {
            $('body').removeClass('loading');
        }
    });
});
</script>
<!-- //flexSlider (for testimonials) -->

<!-- stats -->
<script src="{{ url('/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ url('/js/jquery.countup.js') }}"></script>
<script>
$('.counter').countUp();
</script>
<!-- //stats -->

<!-- password-script -->
@guest
<script>
window.onload = function () {
    document.getElementById("password1").onchange = validatePassword;
    document.getElementById("password2").onchange = validatePassword;
}

function validatePassword() {
    var pass2 = document.getElementById("password2").value;
    var pass1 = document.getElementById("password1").value;
    if (pass1 != pass2)
    document.getElementById("password2").setCustomValidity("Passwords Don't Match");
    else
    document.getElementById("password2").setCustomValidity('');
    //empty string means no validation error
}
</script>
<!-- //password-script -->
@endauth

<!-- smooth scrolling -->
<script src="{{ url('/js/SmoothScroll.min.js') }}"></script>
<!-- //smooth scrolling -->

<!-- move-top -->
<script src="{{ url('/js/move-top.js') }}"></script>
<!-- easing -->
<script src="{{ url('/js/easing.js') }}"></script>
<!--  necessary snippets for few javascript files -->
<script src="{{ url('/js/district.js') }}"></script>

<script src="{{ url('/js/bootstrap.js') }}"></script>
<!-- Necessary-JavaScript-File-For-Bootstrap -->
<!-- //Js files -->
<script>
$(document).ready(function(){
    $('select').each(function(){
        var selected = $(this).attr('value');
        if(typeof(selected) !== 'undefined'){
            $(this).val(selected);
        }
    });

    $("#g-inv").keyup(function(e) {
        $("#g-amt").val($(this).val() * 1.3);
    });

    $("#p-inv").keyup(function(e) {
        $("#p-amt").val($(this).val() * 1.5);
    });

    $('#_share_checkbox').click(function(){
        if($(this).prop('checked')){
            $('._share_checkbox').prop('checked', true);
        }else{
            $('._share_checkbox').prop('checked', false);
        }
        select_merge();
    });

    $('._share_checkbox').click(function(){
        $('#_share_checkbox').prop('indeterminate', true);
        select_merge();
    });

    $(".g-clock").each(function(){
        if(parseInt($(this).attr('time-now')) >= parseInt($(this).attr('time'))){
            $(this).text('Drawing...');
            setTimeout(reloadWindow, 120000);
            return;
        }
        $(this).countdown(parseInt($(this).attr('time'))*1000, function(event) {
            $(this).text(
                event.strftime('%H:%M:%S')
            );
        })
        .on('finish.countdown', function(){
            $(this).text('Drawing...');
            setTimeout(reloadWindow, 60000);
        });
    });
});

function reloadWindow(){
    location.reload();
}
function submitForm(btn){
    var formid = $(btn).attr('form-id');
    var message = $(btn).attr('form-action');
    vex.dialog.confirm({
        message: 'Are you sure you want to '+message+'?',
        callback: function (value) {
            if (value) {
                $('#'+formid).submit();
            }
        }
    });
}
function submitFormById(formid, message){
    vex.dialog.confirm({
        message: 'Are you sure you want to '+message+'?',
        callback: function (value) {
            if (value) {
                $('#'+formid).submit();
            }
        }
    });
}
function submitFormById(formid){
    var $form = $('#'+formid);
    if($form[0].checkValidity()) $form.submit();
    else $form[0].reportValidity()
}
</script>
</body>
</html>
