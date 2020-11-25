<!doctype html>
<html lang="en">
	 <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui"
    />
    <title>Reward Zone | <?php if(Request::segment(1) == ''): ?> Home <?php else: ?> <?php echo e(ucfirst(Request::segment(1)), false); ?> <?php endif; ?></title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Mannatthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="assets/images/favicon.ico" />

    <link href="assets/plugins/morris/morris.css" rel="stylesheet" />

    <link
      href="assets/css/bootstrap.min.css"
      rel="stylesheet"
      type="text/css"
    />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
  </head>
  
	<?php echo $__env->yieldContent('content'); ?>
	<!-- js placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="<?php echo e(url('/asset/js/bootstrap.min.js'), false); ?>"></script>
    <script class="include" type="text/javascript" src="<?php echo e(url('/asset/js/jquery.dcjqaccordion.2.7.js'), false); ?>"></script>
    <script src="<?php echo e(url('/asset/js/jquery.scrollTo.min.js'), false); ?>"></script>
    <script src="<?php echo e(url('/asset/plugins/summernote-0.8.3/summernote.min.js'), false); ?>"></script>
    <script src="<?php echo e(url('/asset/js/jquery.nicescroll.js'), false); ?>" type="text/javascript"></script>

    <!--common script for all pages-->
    <script src="<?php echo e(url('/asset/js/common-scripts.js'), false); ?>"></script>

    <script type="text/javascript" src="<?php echo e(url('/asset/js/gritter/js/jquery.gritter.js'), false); ?>"></script>
    <script type="text/javascript" src="<?php echo e(url('/asset/js/gritter-conf.js'), false); ?>"></script>

	<script src="<?php echo e(url('/asset/js/vex/js/vex.combined.min.js'), false); ?>"></script>
	<script src="<?php echo e(url('/asset/js/jquery.countdown.min.js'), false); ?>"></script>
	<script>vex.defaultOptions.className = 'vex-theme-wireframe'</script>
	<script src="<?php echo e(url('/asset/js/app.js'), false); ?>" type="text/javascript"></script>
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

	function deleteRowDialog(btn){
		var url = $(btn).attr('data-url');
		var messg = $(btn).attr('data-msg');

		vex.dialog.confirm({
		message: 'Are you sure you want to delete '+ messg +'?',
			callback: function (value) {
				if (value) {
					$(btn).closest('tr').addClass("danger");
					$.ajax({
						url:url,
						dataType:'json',
						data: { _method:'delete' },
						type:'post',
						success: function(response){
							if(response.success){
								$(btn).closest('tr').remove();
							}else {
								$(btn).closest('tr').removeClass("warning");
								vex.dialog.alert(response['error-status']);
							}
						},
						error: function(){
							$(btn).closest('tr').removeClass("warning");
							vex.dialog.alert('Unable to delete '+ messg);
						}
					});
				}
			}
		});
	}

    function uploadImage(file, el) {
        console.log('trying to upload image');
        var form_data = new FormData();
        form_data.append('image',file);
        $.ajax ({
            data: form_data,
            type: "POST",
            url: "<?php echo e(url('/admin/image'), false); ?>",
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
