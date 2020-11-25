<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="theme-color" content="#f75a5a" />
		<link type="image/x-icon" href="/favicon.ico" rel="icon" />
		<link rel="shortcut icon" href="/favicon.ico?" type="image/x-icon">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
		<title>Mutual Funds Comunity</title>
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
		<meta property="og:url"           content="https://www.mutualfund.community" />
		<meta property="og:type"          content="website" />
		<meta property="og:title"         content="Mutual Fund Community" />
		<meta property="og:description"   content="Donate now and get donations from members worth 100% of your donation" />

		<meta name="viewport" content="width=device-width" />

		<!-- Bootstrap core CSS -->
	    <link href="/assets/css/bootstrap.css" rel="stylesheet">
	    <!--external css-->
	    <link href="/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	    <link rel="stylesheet" type="text/css" href="/assets/js/gritter/css/jquery.gritter.css" />
	    <link rel="stylesheet" type="text/css" href="/assets/lineicons/style.css">    
	    
	    <!-- Custom styles for this template -->
	    <link href="/assets/css/dashboard_style.css" rel="stylesheet">
	    <link href="/assets/css/style-responsive.css" rel="stylesheet">
		<link rel="stylesheet" href="/assets/css/vex/css/vex.css" />
		<link rel="stylesheet" href="/assets/css/vex/css/vex-theme-os.css" />
		<link href="/assets/css/vex/css/vex-theme-wireframe.css" rel="stylesheet" />

		<!-- Scripts -->
		<script>
			window.Laravel = <?php echo json_encode([
				'csrfToken' => csrf_token(),
			]); ?>;
		</script>

	</head>
	<?php echo $__env->yieldContent('content'); ?>
	<!-- js placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="/assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="/assets/js/jquery.scrollTo.min.js"></script>
    <script src="/assets/js/jquery.nicescroll.js" type="text/javascript"></script>

    <!--common script for all pages-->
    <script src="/assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="/assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="/assets/js/gritter-conf.js"></script>	
	
	<script src="/assets/js/vex/js/vex.combined.min.js"></script>
	<script src="/assets/js/jquery.countdown.min.js"></script>
	<script>vex.defaultOptions.className = 'vex-theme-wireframe'</script>
	<script src="/assets/js/app.js" type="text/javascript"></script>

</html>
