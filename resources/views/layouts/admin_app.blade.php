<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="theme-color" content="#f75a5a" />
		<link type="image/x-icon" href="{{ url('/favicon.ico') }}" rel="icon" />
		<link rel="shortcut icon" href="{{ url('/favicon.ico?') }}" type="image/x-icon">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>Rewardzone |  @if(Request::segment(1) == '') Home @else {{ ucfirst(Request::segment(1)) }} @endif</title>
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
		<meta property="og:url"           content="" />
		<meta property="og:type"          content="website" />
		<meta property="og:title"         content="Rewardzone " />

		<meta name="viewport" content="width=device-width" />

		<!-- Bootstrap core CSS -->
	    <link href="{{ url('/asset/css/bootstrap.css') }}" rel="stylesheet">
	    <!--external css-->
	    <link href="{{ url('/asset/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
	    <link rel="stylesheet" type="text/css" href="{{ url('/asset/js/gritter/css/jquery.gritter.css') }}" />
	    <link rel="stylesheet" type="text/css" href="{{ url('/asset/lineicons/style.css') }}">
        <link rel="stylesheet" href="{{ url('/asset/plugins/summernote-0.8.3/summernote.css') }}">

	    <!-- Custom styles for this template -->
	    <link href="{{ url('/asset/css/dashboard_style.css') }}" rel="stylesheet">
	    <link href="{{ url('/asset/css/style-responsive.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="{{ url('/asset/css/vex/css/vex.css') }}" />
		<link rel="stylesheet" href="{{ url('/asset/css/vex/css/vex-theme-os.css') }}" />
		<link href="{{ url('/asset/css/vex/css/vex-theme-wireframe.css') }}" rel="stylesheet" />
		    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

		<!-- Scripts -->
		<script>
			window.Laravel = {!! json_encode([
				'csrfToken' => csrf_token(),
			]) !!};
		</script>

	</head>
	<style>
.center{
		display: block;
		margin-left: auto;
		margin-right: auto;
		width: 50%;

	}
	.box{
	width:150px;
	height:25px;
}

.orange{
	background:#ffcc00;
}

input[type=Password], [type=email], [type=number], [type=text]  {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    background-color: #ffcc00;
    color: white;
}
/*Now the CSS*/
* {margin: 0; padding: 0;}

.tree ul {
	padding-top: 20px; position: relative;

	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}

.tree li {
	float: left; text-align: center;
	list-style-type: none;
	position: relative;
	padding: 20px 5px 0 5px;

	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}

/*We will use ::before and ::after to draw the connectors*/

.tree li::before, .tree li::after{
	content: '';
	position: absolute; top: 0; right: 50%;
	border-top: 1px solid #ccc;
	width: 50%; height: 20px;
}
.tree li::after{
	right: auto; left: 50%;
	border-left: 1px solid #ccc;
}

/*We need to remove left-right connectors from elements without
any siblings*/
.tree li:only-child::after, .tree li:only-child::before {
	display: none;
}

/*Remove space from the top of single children*/
.tree li:only-child{ padding-top: 0;}

/*Remove left connector from first child and
right connector from last child*/
.tree li:first-child::before, .tree li:last-child::after{
	border: 0 none;
}
/*Adding back the vertical connector to the last nodes*/
.tree li:last-child::before{
	border-right: 1px solid #ccc;
	border-radius: 0 5px 0 0;
	-webkit-border-radius: 0 5px 0 0;
	-moz-border-radius: 0 5px 0 0;
}
.tree li:first-child::after{
	border-radius: 5px 0 0 0;
	-webkit-border-radius: 5px 0 0 0;
	-moz-border-radius: 5px 0 0 0;
}

/*Time to add downward connectors from parents*/
.tree ul ul::before{
	content: '';
	position: absolute; top: 0; left: 50%;
	border-left: 1px solid #ccc;
	width: 0; height: 20px;
}

.tree li a{
	border: 1px solid #ccc;
	padding: 5px 10px;
	text-decoration: none;
	color: #666;
	font-family: arial, verdana, tahoma;
	font-size: 11px;
	display: inline-block;

	border-radius: 5px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;

	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}

/*Time for some hover effects*/
/*We will apply the hover effect the the lineage of the element also*/
.tree li a:hover, .tree li a:hover+ul li a {
	background: #c8e4f8; color: #000; border: 1px solid #94a0b4;
}
/*Connector styles on hover*/
.tree li a:hover+ul li::after,
.tree li a:hover+ul li::before,
.tree li a:hover+ul::before,
.tree li a:hover+ul ul::before{
	border-color:  #94a0b4;
}
</style>
	@yield('content')
	<!-- js placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="{{ url('/asset/js/bootstrap.min.js') }}"></script>
    <script class="include" type="text/javascript" src="{{ url('/asset/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ url('/asset/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ url('/asset/plugins/summernote-0.8.3/summernote.min.js') }}"></script>
    <script src="{{ url('/asset/js/jquery.nicescroll.js') }}" type="text/javascript"></script>

    <!--common script for all pages-->
    <script src="{{ url('/asset/js/common-scripts.js') }}"></script>

    <script type="text/javascript" src="{{ url('/asset/js/gritter/js/jquery.gritter.js') }}"></script>
    <script type="text/javascript" src="{{ url('/asset/js/gritter-conf.js') }}"></script>

	<script src="{{ url('/asset/js/vex/js/vex.combined.min.js') }}"></script>
	<script src="{{ url('/asset/js/jquery.countdown.min.js') }}"></script>
	<script>vex.defaultOptions.className = 'vex-theme-wireframe'</script>
	<script src="{{ url('/asset/js/app.js') }}" type="text/javascript"></script>
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
    @if(Request::is('admin/*'))
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
            url: "{{ url('/admin/image') }}",
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
    @endif

<div class="container">

  <img class="img-responsive center" src="/images/footer.png" alt="Cashspringlogo" width="500" height="250">
</div>
</html><br>
<!-- copyright -->
<div class="copy_right py-4 text-center">
    <p>Rewardzone © 2020 . All rights reserved 
    </p>
</div>
<!-- //copyright -->
