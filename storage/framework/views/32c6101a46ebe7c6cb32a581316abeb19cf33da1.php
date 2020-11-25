<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<link rel="shortcut icon" href="/favicon.ico?" type="image/x-icon">
		<link type="image/x-icon" href="/favicon.ico" rel="icon" />
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
		<meta name="theme-color" content="#f75a5a" />
		<title>Achievers Empire</title>
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
		<meta property="og:url"           content="https://www.achieversempir.com" />
		<meta property="og:type"          content="website" />
		<meta property="og:title"         content="Achievers Empire" />
		<meta property="og:description"   content="Community of helpers who make donations to each other" />
		<meta property="og:image"         content="#" />

		<meta name="viewport" content="width=device-width" />

		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Candal">
	    <link rel="stylesheet" type="text/css" href="/assets/css/font-awesome.min.css">
	    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
	    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
		<link rel="stylesheet" href="/assets/css/vex/css/vex.css" />
		<link rel="stylesheet" href="/assets/css/vex/css/vex-theme-os.css" />

		<!-- Scripts -->
		<script>
			window.Laravel = <?php echo json_encode([
				'csrfToken' => csrf_token(),
			]); ?>;
		</script>

	</head>
	<?php echo $__env->yieldContent('content'); ?>
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="/assets/js/jquery.easing.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/custom.js"></script>
	<script src="/assets/js/vex/js/vex.combined.min.js"></script>
	<script src="/assets/js/jquery.countdown.min.js"></script>
	<script>vex.defaultOptions.className = 'vex-theme-os'</script>
	<script src="/assets/js/app.js" type="text/javascript"></script>

</html>
