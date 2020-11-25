<?php $__env->startSection('content'); ?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Achievers Empire</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <link href="css/agency.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js" integrity="sha384-0s5Pv64cNZJieYFkXYOTId2HMA2Lfb6q2nAcx2n0RTLUnCAoTTsS0nKEO27XyKcY" crossorigin="anonymous"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js" integrity="sha384-ZoaMbDF+4LeFxg6WdScQ9nnR1QC2MIRxA1O9KWEXQwns1G8UNyIEZIQidzb0T1fo" crossorigin="anonymous"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Achievers Empire</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                       
                    </li>
                    <li>
                        <a class="page-scroll" href="#portfolio">Packages</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#">Login</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#">Register</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Welcome To Achievers Empire</div>
                <div class="intro-heading">It's Nice To have you on board<br>
				<div class="intro-lead-in">Launching Wednesday 9th of August</div>
				</div>
				<p><SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript">
<!--

dateFuture = new Date(2017,7,9,12,00,00);

function GetCount(){

        dateNow = new Date();                                                                        //grab current date
        amount = dateFuture.getTime() - dateNow.getTime();                //calc milliseconds between dates
        delete dateNow;

        // time is already past
        if(amount < 0){
                document.getElementById('countbox').innerHTML="Now!";
        }
        // date is still good
        else{
                days=0;hours=0;mins=0;secs=0;out="";

                amount = Math.floor(amount/1000);//kill the "milliseconds" so just secs

                days=Math.floor(amount/86400);//days
                amount=amount%86400;

                hours=Math.floor(amount/3600);//hours
                amount=amount%3600;

                mins=Math.floor(amount/60);//minutes
                amount=amount%60;

                secs=Math.floor(amount);//seconds

                if(days != 0){out += days +" day"+((days!=1)?"s":"")+", ";}
                if(days != 0 || hours != 0){out += hours +" hour"+((hours!=1)?"s":"")+", ";}
                if(days != 0 || hours != 0 || mins != 0){out += mins +" minute"+((mins!=1)?"s":"")+", ";}
                out += secs +" seconds";
                document.getElementById('countbox').innerHTML=out;

                setTimeout("GetCount()", 1000);
        }
}

window.onload=function(){GetCount();}//call when everything has loaded

//-->
</script>
<div id="countbox"></div>

                <a href="#" class="page-scroll btn btn-xl">Register</a>
            </div>
        </div>
    </header>

	
	
   
</body>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>