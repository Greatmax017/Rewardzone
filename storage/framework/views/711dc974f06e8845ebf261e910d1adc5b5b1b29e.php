<?php $__env->startSection('content'); ?>
<body>

	<div id="wrapper">
		<?php echo $__env->make('sections.d_header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo $__env->make('sections.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          		<?php if(session('error-status')): ?>
					<div class="alert alert-danger alert-dismissable">
					    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					    <div class="container-fluid">
					      <center><b>Error:</b> <?php echo e(session('error-status'), false); ?></center>
					    </div>
					</div>
				<?php endif; ?>
				<?php if(session('success-status')): ?>
					<div class="alert alert-success alert-dismissable">
					    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					    <div class="container-fluid">
						<center><?php echo e(session('success-status'), false); ?></center>
					    </div>
					</div>
				<?php endif; ?>






               <?php if( !ctype_alpha($firstCharacter)): ?>
              <div class="row">
                <div class="col-md-12">
					  <div class="">
                    	<div class="panel panel-default">
							<div class="panel-heading"><center><b><font  face=="arial-black">Juicebox Earnings</font> </b></center></div>
							<div class="panel-body">
								<div class="">


									<center>

                                    <div class="box orange">&nbsp; Cycle 1/div>
										<table >

                                        <tr></tr><td> Level 1 (Water): &nbsp;</td><td><b><div class="box orange">&nbsp;&#8358;2,000</div> </b></td></tr><br>
									</table>
                                    <table >
                                    <tr><td> Level 2 (Orange):&nbsp; </td><td><b><div class="box orange">&nbsp;&#8358;8,000</div> </b></td></tr><br>
                                    </table>
                                    <table >
                                    <tr><td> Level 3 (Freeze):  &nbsp;</td><td><b><div class="box orange">&nbsp; &#8358;13,000</div> </b></td></tr><br>
                                    </table>
                                    <table >
                                    <tr><td> Level 4 (Juice):&nbsp; </td><td><b><div class="box orange">&nbsp; &#8358;20,000</div> </b></td></tr><br>
                                    </table>

									</center>
								</div>
							</div>
					</div>
                 <?php else: ?>

                    <div class="row">
                <div class="col-md-12">
					  <div class="">
                    	<div class="panel panel-default">
							<div class="panel-heading"><center><b><font  face=="arial-black">Juicebox Earnings</font> </b></center></div>
							<div class="panel-body">
								<div class="">
                               <center>

                        <div class="box orange">&nbsp; Cycle 2</div>
										<table >

                                        <tr></tr><td> Level 1 (Water): &nbsp;</td><td><b><div class="box orange">&nbsp;&#8358;14,000</div> </b></td></tr><br>
									</table>
                                    <table >
                                    <tr><td> Level 2 (Orange):&nbsp; </td><td><b><div class="box orange">&nbsp;&#8358;22,000</div> </b></td></tr><br>
                                    </table>
                                    <table >
                                    <tr><td> Level 3 (Freeze):  &nbsp;</td><td><b><div class="box orange">&nbsp; &#8358;45,000</div> </b></td></tr><br>
                                    </table>
                                    <table >
                                    <tr><td> Level 4 (Juice):&nbsp; </td><td><b><div class="box orange">&nbsp; &#8358;60,000</div> </b></td></tr><br>
                                    </table>

									</center>
								</div>
							</div>
					</div>
                    <?php endif; ?>

          </div><!-- /col-lg-9 END SECTION MIDDLE -->

    </body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.d_app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>