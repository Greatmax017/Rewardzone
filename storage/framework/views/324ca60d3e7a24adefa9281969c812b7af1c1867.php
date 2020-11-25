<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cryptobitbybit | <?php if(Request::segment(1) == ''): ?> Home <?php else: ?> <?php echo e(ucfirst(Request::segment(1)), false); ?> <?php endif; ?></title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Bitcoin, trading, gain" />
    <meta name="csrf-token" content="<?php echo e(csrf_token(), false); ?>">
    <meta name="description" content="Cryptobitbybit Bitcoin Trading Company is a professional investment corporation engaged in stock market, foreign exchange market, Forex Trade and gold trading." />
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
    <link rel="stylesheet" href="<?php echo e(url('/css/bootstrap.css'), false); ?>">
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="<?php echo e(url('/css/style.css'), false); ?>" type="text/css" media="all" />

    <link rel="stylesheet" href="<?php echo e(url('/asset/css/vex/css/vex.css'), false); ?>" />
    <link rel="stylesheet" href="<?php echo e(url('/asset/css/vex/css/vex-theme-os.css'), false); ?>" />
    <link href="<?php echo e(url('/asset/css/vex/css/vex-theme-wireframe.css'), false); ?>" rel="stylesheet" />
    <!-- Style-CSS -->
    <link rel="stylesheet" href="<?php echo e(url('/css/fontawesome-all.css'), false); ?>">
    <!-- Font-Awesome-Icons-CSS -->
    <!-- //Custom-Files -->

    <!-- Web-Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
    <!-- //Web-Fonts -->
</head>

<body>
    <!-- banner -->
    <div class="bannerbg-w3l <?php echo e(Request::is('/') ? '':'bannerbg-w3l-inner', false); ?>">
        <!-- header -->
        <header>
            <div class="header_topw3layouts_bar">
                <div class="container">
                    <!-- header-top -->
                    <div class="row border-bottom py-lg-4 py-3">
                        <div class="col-md-8 col-lg-6 header_agileits_left">
                            <ul>
                                <li class="mr-3">
                                    <i class="fas fa-phone mr-2"></i> +1(213) 770 9231</li>
                                    <li>
                                        <i class="fas fa-envelope mr-2"></i>
                                        <a href="mailto:support@Cryptobitbybit.com">support@cryptobitbybit.com</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4 col-lg-6 header_right text-center mt-lg-0 mt-2">
                                <div class="row">
                                    <?php if(auth()->guard()->guest()): ?>
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
                                    <?php else: ?>
                                    <div class="col-6 header-loginw3ls text-lg-right text-center">
                                        <a href="<?php echo e(url('/dashboard'), false); ?>" class="log">
                                            <i class="fas fa-user mr-2"></i> Welcome, <?php echo e(strlen(Auth::user()->name) > 12 ? substr(Auth::user()->name,0, 12).'...' : Auth::user()->name, false); ?>

                                        </a>
                                    </div>
                                    <div class="col-6 header-loginw3ls">
                                        <a href="<?php echo e(url('/logout'), false); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="log">
                                            <i class="fas fa-lock mr-2"></i> Logout
                                        </a>
                                        <form id="logout-form" action="<?php echo e(url('/logout'), false); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field(), false); ?>

                                        </form>
                                    </div>
                                    <div class="col-6 header-loginw3ls text-lg-right text-center">
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <!-- //social icons -->

                                </div>
                            </div>
                        </div>
                        <!--// header-top -->

                        <!-- navigation -->
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                            <a class="navbar-brand" href="<?php echo e(url('/'), false); ?>">Cryptobitbybit
                                <span>Bitcoin Investments</span>
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item <?php echo e(Request::is('/') ? 'active':'', false); ?>">
                                    <a class="nav-link" href="<?php echo e(url('/'), false); ?>">Home
                                        <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                                <li class="nav-item mx-xl-2 mx-lg-1 my-lg-0 my-2 <?php echo e(Request::is('about') ? 'active':'', false); ?>">
                                    <a class="nav-link" href="<?php echo e(url('/about'), false); ?>">About Us</a>
                                </li>
                                <li class="nav-item mx-xl-2 mx-lg-1 my-lg-0 my-2">
                                    <a class="nav-link scroll" href="<?php echo e(url('/'), false); ?>/#services">Services</a>
                                </li>
                                <li class="nav-item mx-xl-2 mx-lg-1 my-lg-0 my-2">
                                    <a class="nav-link scroll" href="<?php echo e(url('/'), false); ?>/#pricings">Investment Plans</a>
                                </li>
                                <li class="nav-item <?php echo e(Request::is('contact') ? 'active':'', false); ?>">
                                    <a class="nav-link" href="<?php echo e(url('/contact'), false); ?>">Contact Us</a>
                                </li>
                                <?php if(auth()->guard()->check()): ?>
                                <li class="nav-item dropdown <?php echo e(Request::is('dashboard') ? 'active':'', false); ?>">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Account
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="<?php echo e(url('/dashboard'), false); ?>"><i class="fa fa-chart-line"></i> Dashboard</a>
                                        <a class="dropdown-item" href="<?php echo e(url('/profile'), false); ?>"><i class="fa fa-user"></i> My Profile</a>
                                        <a class="dropdown-item" href="<?php echo e(url('/messagebox'), false); ?>"><i class="fa fa-life-ring"></i> Support</a>

                                        <?php if(Auth::user()->isAdmin()): ?>
                                        <a class="dropdown-item" href="<?php echo e(url('/admin'), false); ?>"><i class="fa fa-chart-line"></i> Admin Panel</a>
                                        <?php endif; ?>
                                    </div>
                                </li>
                                <?php endif; ?>
                            </ul>
                    </div>
                </nav>
                <!-- //navigation -->
            </div>
        </div>
    </header>
    <!-- //header -->
    <?php if(Request::is('/')): ?>
    <!-- banner text -->
    <div class="banner-text-agile">
        <div class="container">
            <div class="banner-w3lstexts text-white text-center">
                <h1>Welcome to Cryptobitbybit</h1>
                <h4 class="text-uppercase mt-md-3 mt-2 mb-md-4 mb-3">Bitcoin Investment</h4>
                <p class="text-white"></p>
                <a href="<?php echo e(url('/about'), false); ?>" class="banner-button btn mt-md-5 mt-4">Know More</a>
            </div>
        </div>
    </div>
    <!-- //banner text -->
    <?php else: ?>
    <!-- banner-text -->
    <div class="banner-w3ltext about-w3bnr">
        <div class="container">
            <h1 class="text-white text-center">
                <a href="<?php echo e(url('/'), false); ?>">Home</a> / <?php if(Auth::check() && !Request::is('dashboard')): ?> <a href="<?php echo e(url('/dashboard'), false); ?>">Dashboard</a> / <?php endif; ?> <?php echo e(ucfirst(Request::segment(1)), false); ?>

            </h1>
        </div>
    </div>
    <!-- //banner-text -->
    <?php endif; ?>
</div>
<?php if(auth()->guard()->guest()): ?>
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
                    <form action="<?php echo e(url('/login'), false); ?>" method="post">
                        <?php echo csrf_field(); ?>
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
                            <a href="<?php echo e(url('/password/reset'), false); ?>">Forgot your password?</a>
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
                    <form action="<?php echo e(url('/register'), false); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Full Name" required="">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Enter Email Address" required="">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" name="phone" placeholder="Enter Phone Number" required="">
                        </div>
                        <div class="form-group">
                            <label>Bitcoin Wallet Address</label>
                            <input type="text" class="form-control" name="bitcoin_wallet_id" placeholder="Enter Bitcoin Wallet Address" required="">
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Password</label>
                            <input type="password" class="form-control" name="password" id="password1" placeholder="Enter password" required="">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password2" placeholder="Confirm Password" required="">
                        </div>
                        <button type="submit" class="btn btn-primary submit mb-4">Register</button>
                        <p class="text-center pb-4">
                            <a href="#">By clicking Register, I agree to your terms</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--//register-->
<?php endif; ?>
<!-- //banner -->

<?php echo $__env->yieldContent('content'); ?>

<?php if(Request::is('/')): ?>
<!-- footer top -->
<div class="footer-top py-5 text-center">
    <div class="container py-xl-5 py-lg-3">
        <h2 class="text-white mb-4">Have any questions?</h2>
        <h5 class="text-white mb-sm-5 mb-4 pb-sm-5 pb-4">Contact Us</h5>
        <i class="fas fa-map-marker-alt"></i>
    </div>
</div>
<!-- //footer top -->
<?php endif; ?>

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
                            <a href="mailto:support@cryptobitbybit.com">support@cryptobitbybit.com</a>
                        </p>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 address-grid my-lg-0 my-4">
                <div class="row address-info">
                    <div class="col-md-3 address-left text-center">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <div class="col-md-9 address-right text-left">
                        <h6 class="ad-info text-uppercase mb-2">call us</h6>
                        <p>+1(213) 770 9231</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 address-grid">
                <div class="row address-info">
                    <div class="col-md-3 address-left text-center">
                        <i class="far fa-map"></i>
                    </div>
                    <div class="col-md-9 address-right text-left">
                        <h6 class="ad-info text-uppercase mb-2">Address</h6>
                        <p> 761 7th Ave,New York City,</p>
                        <p> N.Y. 10224-3640, USA</p>
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
                    <a href="https://t.me/joinchat/D0aHLUVDBu4E5fS39l1DfQ" class="rounded-circle">
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
    <p class="text-white">© 2018 Cryptobitbybit. All rights reserved
    </p>
</div>
<!-- //copyright -->


<!-- Js files -->
<!-- JavaScript -->
<script src="<?php echo e(url('/js/jquery-2.2.3.min.js'), false); ?>"></script>
<!-- Default-JavaScript-File -->
<script src="<?php echo e(url('/js/bootstrap.js'), false); ?>"></script>
<!-- Necessary-JavaScript-File-For-Bootstrap -->

<script src="<?php echo e(url('/asset/js/vex/js/vex.combined.min.js'), false); ?>"></script>
<script>vex.defaultOptions.className = 'vex-theme-os'</script>

<!-- flexSlider (for testimonials) -->
<link rel="stylesheet" href="<?php echo e(url('/css/flexslider.css'), false); ?>" type="text/css" media="screen" property="" />
<script defer src="<?php echo e(url('/js/jquery.flexslider.js'), false); ?>"></script>
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
<script src="<?php echo e(url('/js/jquery.waypoints.min.js'), false); ?>"></script>
<script src="<?php echo e(url('/js/jquery.countup.js'), false); ?>"></script>
<script>
$('.counter').countUp();
</script>
<!-- //stats -->

<!-- password-script -->
<?php if(auth()->guard()->guest()): ?>
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
<?php endif; ?>

<!-- smooth scrolling -->
<script src="<?php echo e(url('/js/SmoothScroll.min.js'), false); ?>"></script>
<!-- //smooth scrolling -->

<!-- move-top -->
<script src="<?php echo e(url('/js/move-top.js'), false); ?>"></script>
<!-- easing -->
<script src="<?php echo e(url('/js/easing.js'), false); ?>"></script>
<!--  necessary snippets for few javascript files -->
<script src="<?php echo e(url('/js/district.js'), false); ?>"></script>

<script src="<?php echo e(url('/js/bootstrap.js'), false); ?>"></script>
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
