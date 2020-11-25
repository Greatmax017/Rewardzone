<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bitlife Trading | Home</title>
    <!--meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Bitcoin, trading, gain" />
    <meta name="csrf-token" content="<?php echo e(csrf_token(), false); ?>">
    <meta name="theme-color" content="#efd033" />
    <script>
    addEventListener("load", function () {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <!--//meta tags ends here-->
    <!--booststrap-->
    <link href="<?php echo e(url('/css/bootstrap.min.css'), false); ?>" rel="stylesheet" type="text/css" media="all">
    <!--//booststrap end-->
    <!-- link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- font-awesome icons -->
    <link href="<?php echo e(url('/css/fontawesome-all.min.css'), false); ?>" rel="stylesheet" type="text/css" media="all">
    <!-- //font-awesome icons -->
    <!-- For Text About slider -->
    <link rel="stylesheet" href="<?php echo e(url('/css/flexslider.css'), false); ?>" type="text/css" media="all" />
    <!-- //For Text About slider -->
    <link rel="stylesheet" href="<?php echo e(url('/asset/css/vex/css/vex.css'), false); ?>" />
    <link rel="stylesheet" href="<?php echo e(url('/asset/css/vex/css/vex-theme-os.css'), false); ?>" />
    <link href="<?php echo e(url('/asset/css/vex/css/vex-theme-wireframe.css'), false); ?>" rel="stylesheet" />
    <!-- For Service pie-chart -->
    <link rel="stylesheet" href="<?php echo e(url('/css/morris.css'), false); ?>">
    <!--//For Service pie-chart -->
    <!--stylesheets-->
    <link href="<?php echo e(url('/css/style.css'), false); ?>" rel='stylesheet' type='text/css' media="all">
    <!--//stylesheets-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500" rel="stylesheet">
</head>
<body>
    <div class="header-outs" id="home">
        <div class="header-w3layouts">
            <!--//navigation section -->
            <div class="headr-title text-center">
                <h1><a class="navbar-brand" href="<?php echo e(url('/'), false); ?>"><span class="fab fa-servicestack"></span>Bitlife Trading</a></h1>
                <div class="clearfix"></div>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse  nav-fill " id="navbarSupportedContent">
                    <ul class="navbar-nav nav-pills nav-fill">
                        <li class="nav-item <?php if(Request::is('/')): ?> active <?php endif; ?>">
                            <a class="nav-link" href="<?php echo e(url('/'), false); ?>">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item <?php if(Request::is('about')): ?> active <?php endif; ?>">
                            <a href="<?php echo e(url('/about'), false); ?>" class="nav-link ">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(url('/'), false); ?>/#services" class="nav-link ">Our Services</a>
                        </li>
                        <li class="nav-item <?php if(Request::is('faq')): ?> active <?php endif; ?>">
                            <a href="<?php echo e(url('/faq'), false); ?>" class="nav-link ">FAQ</a>
                        </li>
                        <?php if(Auth::guest()): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(url('/register'), false); ?>" class="nav-link">Sign Up</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(url('/login'), false); ?>" class="nav-link">Sign In</a>
                        </li>
                        <?php else: ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Welcome, <?php echo e(Auth::user()->name, false); ?>

                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo e(url('/dashboard'), false); ?>"><i class="fa fa-chart-line"></i> Dashboard</a>
                                <a class="dropdown-item" href="<?php echo e(url('/profile'), false); ?>"><i class="fa fa-user"></i> My Profile</a>
                                <a class="dropdown-item" href="<?php echo e(url('/messagebox'), false); ?>"><i class="fa fa-life-ring"></i> Support</a>
                                <a class="dropdown-item" href="<?php echo e(url('/logout'), false); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-lock"></i> Logout</a>
                                <form id="logout-form" action="<?php echo e(url('/logout'), false); ?>" method="POST" style="display: none;">
                                    <?php echo e(csrf_field(), false); ?>

                                </form>
                                <?php if(Auth::user()->isAdmin()): ?>
                                <a class="dropdown-item" href="<?php echo e(url('/admin'), false); ?>"><i class="fa fa-chart-line"></i> Admin Panel</a>
                                <?php endif; ?>
                            </div>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- //Navigation -->
        <?php if(Request::is('/') || Request::is('home')): ?>
        <!-- Slideshow 4 -->
        <div class="slider">
            <div class="callbacks_container">
                <ul class="rslides" id="slider4">
                    <li>
                        <div class="slider-img one-img">
                            <div class="container">
                                <div class="slider-info ">
                                    <div class="upper-info text-left">
                                        <h5>Follow Your Dream</h5>
                                        <div class="bottom-info">
                                            <h4>Build Your Future</h4>
                                        </div>
                                    </div>
                                    <div class="outs_more-buttn">
                                        <a href="<?php echo e(url('/about'), false); ?>">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="slider-img two-img">
                            <div class="container">
                                <div class="slider-info ">
                                    <div class="upper-info text-left">
                                        <h5>Making the wisest choice </h5>
                                        <div class="bottom-info">
                                            <h4>In BitLife Investment</h4>
                                        </div>
                                    </div>
                                    <div class="outs_more-buttn">
                                        <a href="<?php echo e(url('/about'), false); ?>">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="slider-img three-img">
                            <div class="container">
                                <div class="slider-info">
                                    <div class="upper-info text-left">
                                        <h5>Face Your Challenge</h5>
                                        <div class="bottom-info">
                                            <h4>
                                                Become an Investor
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="outs_more-buttn">
                                        <a href="<?php echo e(url('/about'), false); ?>">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- This is here just to demonstrate the callbacks -->
            <!-- <ul class="events">
            <li>Example 4 callback events</li>
        </ul>-->
        <div class="clearfix"></div>
    </div>
    <?php endif; ?>
</div>
<!-- //banner -->
<?php echo $__env->yieldContent('content'); ?>
<!--Footer -->
<section class="buttom-footer py-lg-4 py-md-3 py-sm-3 py-3">
    <div class="container py-lg-5 py-md-5 py-sm-4 py-4">
        <div class="pt-lg-5 pt-md-5 pt-sm-4 pt-3">
            <div class="row footer-agile-grids ">
                <div class="wthree-left-right col-lg-5 col-md-5 col-sm-12">
                    <h4 class="pb-lg-3 pb-3"><i class="fab fa-servicestack"></i>Bitlife Trading</h4>
                    <div class="footer-post d-flex mb-2">
                        <div class="agileinfo_footer_grid1 mr-2">
                            <p class="text-justify">We make bitcoin investments worthwile and we have succeeded in taking the risks away
                                from your investment with our community of investors and cryptocurrency experts, we cant loose.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 wthree-left-right">
                    <h4>Quick Links</h4>
                    <nav class="border-line">
                        <ul class="nav flex-column">
                            <li class="nav-item active">
                                <a class="nav-link" href="<?php echo e(url('/'), false); ?>">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(url('/about'), false); ?>" class="nav-link ">About</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(url('/'), false); ?>/#services" class="nav-link">Services</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(url('/faq'), false); ?>" class="nav-link">Our FAQ</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 wthree-left-right">
                    <h4>Our Contacts</h4>
                    <div class="addres-up">
                        <ul>
                            <li class="d-flex pb-md-3 pb-3">
                                <span class="fas fa-phone-volume d-flex" aria-hidden="true"></span>
                                <p class="d-flex">+1 (818) 917-2517</p>
                            </li>
                            <li  class="d-flex pb-md-3 pb-3">
                                <span class="far fa-envelope d-flex"></span>
                                <p class="d-flex"><a href="mailto:support@bitlifetrading.com">support@bitlifetrading.com</a></p>
                            </li>
                            <li class="d-flex pb-md-3 pb-3">
                                <span class="fas fa-fax d-flex"></span>
                                <p class="d-flex">(818) 917-2517</p>
                            </li>
                        </ul>
                    </div>
                    <div class="icons mt-4">
                        <ul>
                            <li><a target="_blank" href="https://t.me/joinchat/Iwg8cVLJxLQee_QIFEmt7g"><span class="fab fa-telegram"></span></a></li>
                            <li><a target="_blank" href="https://www.facebook.com/BitLife-Trading-Investment-1676626789115505/?modal=admin_todo_tour"><span class="fab fa-facebook-f"></span></a></li>
                            <li><a href="mailto:support@bitlifetrading.com"><span class="fas fa-envelope"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<footer>
    <p>©2018 Bitlife Trading. All Rights Reserved</p>
</footer>
<!-- //Footer -->
<!--js working-->
<script src="<?php echo e(url('/js/jquery-2.2.3.min.js'), false); ?>"></script>
<!--//js working-->
<!--responsiveslides banner-->
<script src="<?php echo e(url('/js/responsiveslides.min.js'), false); ?>"></script>
<script>
// You can also use "$(window).load(function() {"
$(function () {
    // Slideshow 4
    $("#slider4").responsiveSlides({
        auto: true,
        pager:true,
        nav: false,
        speed: 900,
        namespace: "callbacks",
        before: function () {
            $('.events').append("<li>before event fired.</li>");
        },
        after: function () {
            $('.events').append("<li>after event fired.</li>");
        }
    });

});
</script>
<!--// responsiveslides banner-->
<!--About OnScroll-Number-Increase-JavaScript -->
<script src="<?php echo e(url('/js/jquery.waypoints.min.js'), false); ?>"></script>
<script src="<?php echo e(url('/js/jquery.countup.js'), false); ?>"></script>
<script>
$('.counter').countUp();
</script>
<!-- //OnScroll-Number-Increase-JavaScript -->
<!--FlexSlider-JavaScript -->
<script defer src="<?php echo e(url('/js/jquery.flexslider.js'), false); ?>"></script>
<script>
$(window).load(function(){
    $('.flexslider').flexslider({
        animation: "slide",
        start: function(slider){
            $('body').removeClass('loading');
        }
    });
});
</script>
<!-- //FlexSlider-JavaScript -->
<?php if(Request::is('/') || Request::is('home')): ?>
<!--About Chart-JavaScript -->
<script src="<?php echo e(url('/js/homecharts.js'), false); ?>"></script>

<script src="<?php echo e(url('/js/raphael-min.js'), false); ?>"></script>
<!-- //Chart-JavaScript -->
<!--service pie-charts -->

<script src="<?php echo e(url('/js/morris.js'), false); ?>"></script>
<script>
Morris.Donut({
    element: 'graph4',
    data: [
        {value: 20, label: 'Team', formatted: 'at least 20%' },
        {value: 50, label: 'Start Up', formatted: 'at least 50%' },
        {value: 10, label: 'Business', formatted: 'approx. 10%' },
        {value: 10, label: 'Plan', formatted: 'approx. 10%' },
        {value: 10, label: 'Investment rate', formatted: 'Success 10%' }
    ],
    formatter: function (x, data) { return data.formatted; }
});
</script>
<!-- //charts -->
<!-- //pie-Chart-JavaScript -->

<!-- start-smoth-scrolling -->
<script src="<?php echo e(url('/js/move-top.js'), false); ?>"></script>
<script src="<?php echo e(url('/js/easing.js'), false); ?>"></script>
<script>
jQuery(document).ready(function ($) {
    $(".scroll").click(function (event) {
        event.preventDefault();
        $('html,body').animate({
            scrollTop: $(this.hash).offset().top
        }, 900);
    });
});
</script>
<!-- start-smoth-scrolling -->
<!-- here stars scrolling icon -->
<script>
$(document).ready(function () {

    var defaults = {
        containerID: 'toTop', // fading element id
        containerHoverID: 'toTopHover', // fading element hover id
        scrollSpeed: 1200,
        easingType: 'linear'
    };


    $().UItoTop({
        easingType: 'easeOutQuart'
    });

});
</script>
<!-- //here ends scrolling icon -->
<?php endif; ?>
<!--bootstrap working-->
<script src="<?php echo e(url('/js/bootstrap.min.js'), false); ?>"></script>
<script src="<?php echo e(url('/asset/js/vex/js/vex.combined.min.js'), false); ?>"></script>
<script>vex.defaultOptions.className = 'vex-theme-os'</script>
<!-- //bootstrap working-->
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
