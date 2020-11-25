

<?php $__env->startSection('content'); ?>
<style>
.num_select{
    border: 1px solid grey;
    padding: 4px;
    text-align: center;
    width: 30px;
    border-radius:10px;
    font-size:16px;
    line-height: 2;
    cursor:pointer;
}
.num_select_hover:hover{
    background: grey;
    color:white;
}
.num_selected{
    background: grey;
    color:white;
}
.num_selected_blue{
    background: #01b1d7;
    color: white;
    border-color: #01b1d7;
}
</style>
<!-- Inner Page Header serction start here -->
<div class="inner-page-header">
    <div class="container">
        <div class="row">
             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                 <div class="header-page-title">
                     <h2>Guess and Win Big </h2>
                 </div>
             </div>
             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                 <div class="header-page-locator">
                     <ul>
                         <li><a href="/">Home /</a> <a href="/dashboard">Back-Office /</a> Game</li>
                     </ul>
                 </div>
             </div>
        </div>
    </div>
</div>
<!-- **********************************************************************************************************************************************************
  MAIN CONTENT
  *********************************************************************************************************************************************************** -->
<!--main content start-->
<section id="main-content" style="background-image:url('/assets/img/uploads/img_1526580052.jpeg');background-size:contain;">
	<section class="wrapper" style="background:rgba(255,255,255,0.82);">
<!-- Inner Page Header serction end here -->
		<div class="row">
	        <div class="col-lg-10 col-lg-offset-1">
	            <div class="container-fluid">
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
	              <div class="row">
					  <div class="col-md-12">

						  <center>
                              <b>Next Draw in:</b><br><br>
                              <b><span style="color: #07982e;font-size:40px;border:2px solid green;border-radius:10px;padding:10px;margin:10px;" form-id="draw-form" time-now="<?php echo e(\Carbon\Carbon::now()->timestamp, false); ?>" time="<?php echo e(3600 + $game->created_at->timestamp, false); ?>" class="g-clock"></span></b>
                              <br><br><br>
                              <h4>Last Draws Results</h4>
                             <?php $__currentLoopData = explode(',',$old_game->numbers); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $num): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <span class="num_select num_selected_blue"><?php echo e(str_pad($num, 2, '0', STR_PAD_LEFT), false); ?></span>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             <br><br>
                             <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#stake" href="#stake">Stake, Guess & Win</a><hr>
                             <div id="stake" class="modal fade" role="dialog">
                                  <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                      <div class="modal-header">
                                            <h4 class="modal-title">Join Draw</h4>
                                         </div>
                                         <div class="modal-body">
                                            <form id="other-options-form" action="<?php echo e(url('/stake'), false); ?>" method="POST">
                                                <?php echo e(csrf_field(), false); ?>

                                                 <input type="hidden" name="game" value="<?php echo e($game->id, false); ?>" />
                                                 <div class="form-group col-md-12">
                                                    <label class="control-label">Amount to stake (<?php echo Auth::user()->currency; ?>):</label>
                                                    <input type="number" class="form-control" name="amount" value="200" />
                                                </div>
                                                <div class="number_select" class="form-group col-md-12">

                                                </div>
                                                <div class="form-group">
                                                    <center>
                                                        <button type="submit" class="btn btn-sm btn-danger">Join Draw</button>
                                                    </center>
                                                </div>
                                            </form>
                                          </div>
                                    </div>
                                  </div>
                            </div>
                        </center>
                        <div class="col-md-5">
                            <div class="panel panel-primary">
                              <div class="panel-heading">Game Help,Rules & Rewards</div>
                              <div class="panel-body">
                                <p>Below are the basic rules of the game including how your winning is calculated</p>
                                <ul style="list-style-type:square;margin-left:20px;">
                                    <li>Draws are done every hour</li>
                                    <li>20 numbers are released at the end of every draw between 1 and 99</li>
                                    <li>You are to select guess 5 numbers that will be a part of the next released numbers</li>
                                    <li>You have <b>WON</b> if you correctly guess 3 or more numbers (i.e. a win index/status of 3)</li>
                                    <li>The minimum amount you can stake is <?php echo Auth::user()->currency; ?>50</li>
                                    <li>Your winnings are calculated as follows: <br>
                                        Amount = stake x 20 x win_index<br>
                                        <small>e.g. if you staked <?php echo Auth::user()->currency; ?>100 and get 3 correct guesses, your winning is <?php echo Auth::user()->currency; ?>100 x 20 x 3 = <?php echo Auth::user()->currency; ?>6,000</small></li>
                                    <li>Your winning will be credited as a share and will grow into an additional 40% in 15days and then you can withdraw it</li>
                                </ul>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                             <div class="panel panel-primary">
                               <div class="panel-heading">Participated draws in the last 3hours</div>
                               <div class="panel-body">
                                 <div class="table-responsive" style="min-height: 200px;">
                                     <table class="table">
                                       <thead>
                                         <tr>
                                           <th>Amount</th>
                                           <th>Guesses</th>
                                           <th>Status</th>
                                         </tr>
                                       </thead>
                                       <tbody>
                                         <?php $__empty_1 = true; $__currentLoopData = $stakes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                           <tr>
                                             <td><?php echo e(Auth::user()->currency, false); ?><?php echo e(number_format($uc->amount), false); ?></td>
                                             <td><?php echo e($uc->numbers, false); ?></td>
                                             <td><?php if($uc->win_index == null): ?>
                                                 <span class="label label-warning">Pending...</span>
                                                 <?php else: ?>
                                                 <span class="label <?php if($uc->win_index > 2): ?> label-success <?php else: ?> label-danger <?php endif; ?>"> <?php echo e($uc->win_index, false); ?> </span>
                                                 <?php endif; ?>
                                             </td>
                                           </tr>
                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                           <tr>
                                             <td colspan="5"><center><i><b>You have no stakes for the next game</b></i></center></td>
                                           </tr>
                                         <?php endif; ?>
                                       </tbody>
                                     </table>
                                 </div>

                               </div>
                             </div>
                        </div>
                          <hr>
					  </div>
	              </div><!-- /row -->
	          </div><!-- /col-lg-9 END SECTION MIDDLE -->
	    	</div>
		</div>
	</section>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>