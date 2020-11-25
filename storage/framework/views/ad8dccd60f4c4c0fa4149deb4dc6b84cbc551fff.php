<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>10in10 Trading</title>
        <!-- Meta -->
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<meta name="description" content="10in10 Trading. Make 40% of your investment/shares you buy every 15days. We trade digitally on your behalf.">
    	<meta name="author" content="">
        <meta name="csrf-token" content="<?php echo e(csrf_token(), false); ?>">
        <meta name="theme-color" content="#01b1d7" />

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta property="og:url"           content="https://www.10in10trading.com" />
        <meta property="og:type"          content="website" />
        <meta property="og:title"         content="10in10 Trading" />
        <meta property="og:description"   content="Make 40% of your investment/shares you buy every 15days. We trade digitally on your behalf. Everybody is happy in the end." />
        <meta property="og:image"         content="<?php echo e(url('/img/10in10-logo.png'), false); ?>" />

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

		<!-- all css here -->
		<!-- bootstrap v3.3.6 css -->
        <link rel="stylesheet" href="/css/bootstrap.min.css">
		<!-- animate css -->
        <link rel="stylesheet" href="/css/animate.css">
		<!-- jquery-ui.min css -->
        <link rel="stylesheet" href="/css/jquery-ui.min.css">
		<!-- meanmenu css -->
        <link rel="stylesheet" href="/css/meanmenu.min.css">
		<!-- owl.carousel css -->
        <link rel="stylesheet" href="/css/owl.carousel.css">
		<!-- font-awesome css -->
        <link rel="stylesheet" href="/css/font-awesome.min.css">
        <!-- Flaticons css -->
        <link rel="stylesheet" href="/css/flaticon.css">

        <!-- nivo slider CSS
        ============================================ -->
        <link rel="stylesheet" href="/inc/custom-slider/css/nivo-slider.css" type="text/css" />
        <link rel="stylesheet" href="/inc/custom-slider/css/preview.css" type="text/css" media="screen" />

		<!-- style css -->
		<link rel="stylesheet" href="/css/style.css">
        <!-- CSS Color Plate -->
        <link rel="stylesheet" href="/multicolor-css/skype-color.css">
        <link rel="stylesheet" href="/multicolor-css/red-color.css">
        <link rel="stylesheet" href="/multicolor-css/green-color.css">
        <link rel="stylesheet" href="/multicolor-css/blue-color.css">

        <link rel="stylesheet" href="<?php echo e(url('/asset/css/vex/css/vex.css'), false); ?>" />
		<link rel="stylesheet" href="<?php echo e(url('/asset/css/vex/css/vex-theme-os.css'), false); ?>" />
		<link href="<?php echo e(url('/asset/css/vex/css/vex-theme-wireframe.css'), false); ?>" rel="stylesheet" />

		<!-- responsive css -->
        <link rel="stylesheet" href="/css/responsive.css">
		<!-- modernizr css -->
        <script src="/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!--
        <div class="demo-panel-setting-area">
            <div class="cross-button  wow rollIn bounceInLeft" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: bounceInLeft;"><i class="fa fa-cog fa-spin" aria-hidden="true"></i></div>
            <h3>Color Plate: </h3>
            <div class="color-scheme-area">
                <span class="skype-color"></span>
                <span class="red-color"></span>
                <span class="green-color"></span>
                <span class="blue-color"></span>
            </div>
        </div>
        -->
        <header>
            <div class="header-top-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="header-top-left">
                                <ul>
                                    <li><i class="fa fa-globe" aria-hidden="true"></i> Welcome to 10in10 Trading, we have the digital trading expertise</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="header-top-right">
                                <ul>
                                    <li><i class="fa fa-envelope-o" aria-hidden="true"></i> Info@10in10trading.com</li>
                                    <li><i class="fa fa-phone" aria-hidden="true"></i>  +131 221 98182</li>
                                    <?php if(!Auth::guest()): ?>
                                    <li><i class="fa fa-user" aria-hidden="true"></i> <a href="<?php echo e(url('/profile'), false); ?>">My Profile</a></li>
                                    <li><i class="fa fa-lock" aria-hidden="true"></i> <a href="<?php echo e(url('/logout'), false); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-header-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <div class="logo-area">
                                <a href="<?php echo e(url('/'), false); ?>"><img src="<?php echo e(url('/img/10in10-logo.png'), false); ?>" alt="10in10 logo"></a>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                            <div class="main-menu">
                                <ul>
                                    <li class="active"><a href="<?php echo e(url('/'), false); ?>">Home <span></span> </a></li>
                                    <li><a href="<?php echo e(url('/about'), false); ?>">About </a></li>
                                    <li><a href="<?php echo e(url('/#faq'), false); ?>">FAQ<span></span></a></li>

                                    <?php if(Auth::guest()): ?>
                                    <li><a href="<?php echo e(url('/contact'), false); ?>">Contact</a></li>
                                    <li><a href="<?php echo e(url('/register'), false); ?>">Register</a></li>
                                    <li><a href="<?php echo e(url('/login'), false); ?>">Back-Office</a></li>
                                    <?php else: ?>
                                    <li><a href="<?php echo e(url('/affiliates'), false); ?>">Affiliates</a></li>
                                    <li><a href="<?php echo e(url('/game'), false); ?>">Lotto Game</a></li>
                                    <li><a href="<?php echo e(url('/dashboard'), false); ?>">Back-Office</a></li>
                                    <li><a href="<?php echo e(url('/messagebox'), false); ?>">Support <?php if(Auth::user()->received_messages()->where('message_read', 0)->count()): ?>(<b><?php echo e(Auth::user()->received_messages()->where('message_read', 0)->count(), false); ?></b>) <?php endif; ?></a></li>
                                    <?php if(Auth::user()->isAdmin() || Auth::user()->isReader()): ?>
                                    <li><a href="<?php echo e(url('/admin'), false); ?>">Admin Panel</a></li>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 acurate">
                            <div class="search-area">
                                <div id="custom-search-input">
                                    <div class="input-group">
                                        <input type="text" class="search-query form-control" placeholder="Search Here..." />
                                        <span class="input-group-btn">
                                            <button class="btn btn-danger" type="button">
                                                <span><i class="fa fa-search" aria-hidden="true"></i></span>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                <ul>
                                    <li class="active"><a href="<?php echo e(url('/'), false); ?>">Home <span></span> </a></li>
                                    <li><a href="<?php echo e(url('/about'), false); ?>">About </a></li>
                                    <li><a href="<?php echo e(url('/#faqs'), false); ?>">Services <span></span></a></li>
                                    </li>
                                    <li><a href="<?php echo e(url('/contact'), false); ?>">Contact</a></li>
                                    <?php if(Auth::guest()): ?>
                                    <li><a href="<?php echo e(url('/register'), false); ?>">Register</a></li>
                                    <li><a href="<?php echo e(url('/login'), false); ?>">Back-Office</a></li>
                                    <?php else: ?>
                                    <li><a href="<?php echo e(url('/affiliates'), false); ?>">Affiliates</a></li>
                                    <li><a href="<?php echo e(url('/game'), false); ?>">Lotto Game</a></li>
                                    <li><a href="<?php echo e(url('/dashboard'), false); ?>">Back-Office</a></li>
                                    <li><a href="<?php echo e(url('/messagebox'), false); ?>">Support</a></li>
                                    <li><a href="<?php echo e(url('/profile'), false); ?>">My Profile</a></li>
                                    <?php if(Auth::user()->isAdmin() || Auth::user()->isReader()): ?>
                                    <li><a href="<?php echo e(url('/admin'), false); ?>">Admin Panel</a></li>
                                    <?php endif; ?>
                                    <li><a href="<?php echo e(url('/logout'), false); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                    <form id="logout-form" action="<?php echo e(url('/logout'), false); ?>" method="POST" style="display: none;">
                                        <?php echo e(csrf_field(), false); ?>

                                    </form>
                                    <?php endif; ?>
                                </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header area end here -->

        	<?php echo $__env->yieldContent('content'); ?>


            <!-- footer area start here -->
            <footer>
                <div class="footer-top-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                <div class="footer-top">
                                    <p>Login to Back-Office</p>
                                    <h2><i class="fa fa-phone" aria-hidden="true"></i> +131 221 98182</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row main-footer">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="single-footer">
                                    <a href="<?php echo e(url('/'), false); ?>">
                                        <img src="<?php echo e(url('/img/10in10-logo.png'), false); ?>" alt="10in10 Logo">
                                    </a>
                                    <p>Make 40%of your investment/shares you buy every 15days. We trade digitally on your behalf. Everybody is happy in the end.</p>
                                    <div class="footer-social-media-area">
                                      <nav>
                                        <ul>
                                          <li><a href="https://facebook.com/10in10"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                          <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                          <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                          <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                                          <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                          <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        </ul>
                                      </nav>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="single-footer footer-two">
                                    <h3>Quick Links</h3>
                                    <nav>
                                        <ul>
                                            <li><i class="fa fa-arrow-circle-right" aria-hidden="true"></i><a href="/about" style="display:inline;color:white;">About 10in10</a></li>
                                            <li><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>Become a Manager</li>
                                            <li><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>Start Making Investments</li>
                                            <li><i class="fa fa-arrow-circle-right" aria-hidden="true"></i><a href="/#faq" style="display:inline;color:white;">Frequently Asked Questions<a></li>
                                            <li><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>Blog</li>

                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="single-footer footer-three">
                                    <h3>Contact</h3>
                                    <nav>
                                        <ul>

                                            <li><i class="fa fa-phone" aria-hidden="true"></i>+131 221 98182 </li>
                                            <li><i class="fa fa-envelope-o" aria-hidden="true"></i> info@10in10trading.com</li>
                                        </ul>
                                    </nav>
                                </div>
                                <a href="https://play.google.com/store/apps/details?id=org.teninten.teninten" target="_blank"><img src="/images/playstore.png" style="max-width:250px;" class="img-responsive"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                <p>&copy;2018 Copyrights 10in10Trading. All rights reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- footer area end here -->

		<!-- all js here -->
		<!-- jquery latest version -->
        <script src="/js/vendor/jquery-1.12.0.min.js"></script>
		<!-- bootstrap js -->
        <script src="/js/bootstrap.min.js"></script>
		<!-- owl.carousel js -->
        <script src="/js/owl.carousel.min.js"></script>
		<!-- meanmenu js -->
        <script src="/js/jquery.meanmenu.js"></script>
		<!-- jquery-ui js -->
        <script src="/js/jquery-ui.min.js"></script>
		<!-- wow js -->
        <script src="/js/wow.min.js"></script>
        <!-- jquery.counterup js -->
        <script src="/js/jquery.counterup.min.js"></script>
        <script src="/js/waypoints.min.js"></script>
		<!-- plugins js -->
        <script src="/js/plugins.js"></script>
        <script src="<?php echo e(url('/asset/js/jquery.countdown.min.js'), false); ?>" type="text/javascript"></script>
        <!-- Nivo slider js
        ============================================ -->
        <script src="/inc/custom-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
        <script src="/inc/custom-slider/home.js" type="text/javascript"></script>
		<!-- main js -->
        <script src="/js/main.js"></script>

    	<script src="<?php echo e(url('/asset/js/vex/js/vex.combined.min.js'), false); ?>"></script>
    	<script>vex.defaultOptions.className = 'vex-theme-wireframe'</script>
    	<script src="<?php echo e(url('/asset/js/app.js'), false); ?>" type="text/javascript"></script>

        <script>
        $(document).ready(function(){
            $('select').each(function(){
                var selected = $(this).attr('value');
                if(typeof(selected) !== 'undefined'){
                    $(this).val(selected);
                }
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

            var num_text = '';
            for(var i = 1; i < 100; i++){
                if(i < 10) num_text += "<span class='num_select num_select_hover' value='"+i+"'>0"+i+"</span>";
                else num_text += "<span class='num_select num_select_hover' value='"+i+"'>"+i+"</span>";
                num_text += "<input style='display:none;' name='numbers[]' type='checkbox' value='"+i+"' id='checkbox-"+i+"'>";
                if(i%9 == 0) num_text += '<br>';
            }
            $('.number_select').html(num_text);

            $(".num_select_hover").each(function(){
                $(this).click(function(){
                    var boxes = $('body').find("input[type=checkbox]");
                    if (boxes.filter(':checked').length >= 5){
                        return;
                    }
                    var checkbox_id = 'checkbox-'+$(this).attr('value');
                    if($('#'+checkbox_id).prop('checked')){
                        $('#'+checkbox_id).prop('checked', false);
                        $(this).removeClass('num_selected');
                    }else{
                        $('#'+checkbox_id).prop('checked', true);
                        $(this).addClass('num_selected');
                    }
                });
            });
        });

        function select_merge(){
            var checked = '';
            $('._share_checkbox').each(function(){
                if($(this).prop('checked')){
                    checked += $(this).attr('value') +',';
                }
            });
            checked = checked.replace(/,$/,'');
            if(checked.indexOf(',') > 0){
                $('#_merge_shares_form_button').show();
            }else{
                $('#_merge_shares_form_button').hide();
            }
            $('#merge_transactions').val(checked);
        }

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
        			if($("#profile-form").length != 0 && ($("#profile-form").serialize() == form_original_data)){
        				vex.dialog.alert('No changes made on the form, nothing to save');
        				return;
        			}
        		    	$('#'+formid).submit();
        		}
        	    }
        	});
        }
    </script>
    </body>
</html>
