<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="theme-color" content="#f75a5a" />
		<link type="image/x-icon" href="<?php echo e(url('/favicon.ico')); ?>" rel="icon" />
		<link rel="shortcut icon" href="<?php echo e(url('/favicon.ico?')); ?>" type="image/x-icon">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
		<title>10in10 Trading...Back Office</title>
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
		<meta property="og:url"           content="https://www.10in10trading.com" />
		<meta property="og:type"          content="website" />
		<meta property="og:title"         content="10in10 Trading" />
		<meta property="og:description"   content="Make 10% profit every 10 days for 1 year" />
        <meta property="og:image"         content="<?php echo e(url('/img/10in10-logo.png')); ?>" />

		<meta name="viewport" content="width=device-width" />

		<!-- Bootstrap core CSS -->
	    <link href="<?php echo e(url('/asset/css/bootstrap.css')); ?>" rel="stylesheet">
	    <!--external css-->
	    <link href="<?php echo e(url('/asset/font-awesome/css/font-awesome.css')); ?>" rel="stylesheet" />
	    <link rel="stylesheet" type="text/css" href="<?php echo e(url('/asset/js/gritter/css/jquery.gritter.css')); ?>" />
	    <link rel="stylesheet" type="text/css" href="<?php echo e(url('/asset/lineicons/style.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(url('/asset/plugins/summernote-0.8.3/summernote.css')); ?>">

	    <!-- Custom styles for this template -->
	    <link href="<?php echo e(url('/asset/css/dashboard_style.css')); ?>" rel="stylesheet">
	    <link href="<?php echo e(url('/asset/css/style-responsive.css')); ?>" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo e(url('/asset/css/vex/css/vex.css')); ?>" />
		<link rel="stylesheet" href="<?php echo e(url('/asset/css/vex/css/vex-theme-os.css')); ?>" />
		<link href="<?php echo e(url('/asset/css/vex/css/vex-theme-wireframe.css')); ?>" rel="stylesheet" />

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
    <script src="<?php echo e(url('/asset/js/bootstrap.min.js')); ?>"></script>
    <script class="include" type="text/javascript" src="<?php echo e(url('/asset/js/jquery.dcjqaccordion.2.7.js')); ?>"></script>
    <script src="<?php echo e(url('/asset/js/jquery.scrollTo.min.js')); ?>"></script>
    <script src="<?php echo e(url('/asset/plugins/summernote-0.8.3/summernote.min.js')); ?>"></script>
    <script src="<?php echo e(url('/asset/js/jquery.nicescroll.js')); ?>" type="text/javascript"></script>

    <!--common script for all pages-->
    <script src="<?php echo e(url('/asset/js/common-scripts.js')); ?>"></script>

    <script type="text/javascript" src="<?php echo e(url('/asset/js/gritter/js/jquery.gritter.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(url('/asset/js/gritter-conf.js')); ?>"></script>

	<script src="<?php echo e(url('/asset/js/vex/js/vex.combined.min.js')); ?>"></script>
	<script src="<?php echo e(url('/asset/js/jquery.countdown.min.js')); ?>"></script>
	<script>vex.defaultOptions.className = 'vex-theme-wireframe'</script>
	<script src="<?php echo e(url('/asset/js/app.js')); ?>" type="text/javascript"></script>
    <script>
        $(document).ready(function(){
            $('select').each(function(){
                var selected = $(this).attr('value');
                if(selected !== 'undefined'){
                    $(this).val(selected);
                }
            })
        });
    </script>
    <?php if(Request::is('admin/*')): ?>
    <script>
    $(document).ready(function() {
      	$('#summernote').summernote({
          		height: 300,                 // set editor height
          		minHeight: 200,             // set minimum height of editor
          		maxHeight: 600,             // set maximum height of editor
                callbacks: {
                    onImageUpload: function(files, editor, welEditable) {
                                    for (var i = files.length - 1; i >= 0; i--) {
                                        uploadImage(files[i], this);
                                    }
                                }
                            }
      	});

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    function uploadImage(file, el) {
        console.log('trying to upload image');
        var form_data = new FormData();
        form_data.append('image',file);
        $.ajax ({
            data: form_data,
            type: "POST",
            url: "<?php echo e(url('/admin/image')); ?>",
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                if(data['status'] == 'success'){
                    $(el).summernote('editor.insertImage',data['url']);
                    vex.dialog.alert('Image Uploaded successfully');
                }else{
                    vex.dialog.alert('Error: Unable to upload image - '+data['message']);
                }
            },
            error: function(){
                vex.dialog.alert('Error: Unable to upload image');
            }
        });
    }
    </script>
    <?php endif; ?>

</html>
