<?php $__env->startSection('content'); ?>
<div style="width:100%;overflow-x:hidden;">
    <iframe height="25" scrolling="no" src="https://www.dailyforex.com/forex-widget/widget/27919" style="width: 160%;margin-left:-5em; height:25px; display: block;border:0px;overflow:hidden;" width="400">
    </iframe>
    <span style="position:relative;display:block;text-align:center;color:#333333;width:100%;font-family:Tahoma,sans-serif;font-size:10px;"></span>
</div>
<!-- Inner Page Header serction end here -->
<section style="background:#eeeeee24;" class="about-inner py-lg-4 py-md-3 py-sm-3 py-3">
    <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
        <?php if(session('address')): ?>
        <div class="alert alert-info">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <div class="container-fluid">
                <center><?php echo session('address'); ?></center>
            </div>
        </div>
        <?php endif; ?>
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
                <center> <?php echo e(session('success-status'), false); ?></center>
            </div>
        </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="alert alert-info">
                    <center>
                        <h5 style="margin-bottom: 10px;"><i class="fa fa-money"></i> Active Investments</h5>
                        <h3 style="margin-bottom: 10px;">$<?php echo e(number_format(\App\Transaction::where('sender', Auth::user()->id)->whereIn('status', [1, 2])->sum('amount'), 2), false); ?></h3>
                    </center>
                </div>
                <hr>
                <div class="card" style="width: 100%;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="#newInvestment" data-toggle="modal" data-target="#newInvestment" class="btn btn-xs btn-block btn-success text-left"><i class="fa fa-plus"></i> New Investment</a></li>
                        <li class="list-group-item"><a href="<?php echo e(url('/transaction_history'), false); ?>" class="btn btn-xs btn-block btn-info text-left"><i class="fa fa-chart-line"></i> My Transactions</a></li>
                        <li class="list-group-item"><a href="<?php echo e(url('/referred_bonus'), false); ?>" class="btn btn-xs btn-block btn-info text-left"><i class="fa fa-users"></i> Referred Users (<?php echo e(\App\User::where('referrer_id', Auth::user()->id)->count(), false); ?>)</a></li>
                        <li class="list-group-item"><a href="<?php echo e(url('/profile'), false); ?>" class="btn btn-xs btn-block btn-info text-left"><i class="fa fa-user"></i> My Profile</a></li>
                        <li class="list-group-item"><a href="<?php echo e(url('/messagebox'), false); ?>" class="btn btn-xs btn-block btn-info text-left"><i class="fa fa-life-ring"></i> Support</a></li>
                        <li class="list-group-item"><a href="<?php echo e(url('/logout'), false); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-xs btn-block btn-danger text-left"><i class="fa fa-lock"></i> Logout</a></li>
                    </ul>
                </div>
                <div id="newInvestment" class="modal fade" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">New Investment</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="investment-form" action="<?php echo e(url('/investment-request'), false); ?>" method="post">
                                    <?php echo e(csrf_field(), false); ?>

                                    <input id="usd-bitcoin-rate" type="hidden" value="<?php echo e(\App\Setting::first()->usd_bitcoin, false); ?>" />
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" name="amount" class="form-check-input" value="20" onchange="document.getElementById('result').innerHTML = (document.getElementById('usd-bitcoin-rate').value * this.value).toFixed(6);" /> Coiner Investment
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" name="amount" class="form-check-input" value="50" onchange="document.getElementById('result').innerHTML = (document.getElementById('usd-bitcoin-rate').value * this.value).toFixed(6);" /> Flip Investment
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" name="amount" class="form-check-input" value="100" onchange="document.getElementById('result').innerHTML = (document.getElementById('usd-bitcoin-rate').value * this.value).toFixed(6);" /> Maximalist Investment
                                        </label>
                                    </div>
                                    <!--div class="form-group">
                                        <input class="form-control" name="hash_code" placeholder="Payment Hash Code" required />
                                    </div-->
                                    <div class="form-group">
                                        <center>
                                            <b><span id="result">0</span> btc</b>
                                        </center>
                                    </div>
                                    <p style="text-align:justify;font-size:12px;"><b>Note:</b> Once you click to get wallet address & and request confirmation, You will be provided with a unique wallet address for your transaction,
                                        you are expected to pay your investment amount within 30mins or the address will be given to another investor.
                                         Your investment will not be confirmed if you dont pay the bitcoin amount eqivalent of your investment amount shown above to the wallet address that would be provided</p>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" onclick="submitFormById('investment-form');">Get Wallet Address & Request Confirmation</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="row mt">
                    <!-- SERVER STATUS PANELS -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">Active Investments
                                <a id="_merge_shares_form_button" style="display:none;"  onclick="submitForm(this);" form-id="merge_shares_form" form-action="merge selected shares to new share with date of newest share and at a fee of 2.5%" class="btn btn-xs btn-default pull-right">Merge shares</a></div>
                                <div class="card-body">
                                    <div class="table-responsive" style="height: 200px;">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Amount</th>
                                                    <th>Current Worth</th>
                                                    <th>Initiated</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__empty_1 = true; $__currentLoopData = $active_shares; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <tr>
                                                    <td>$<?php echo e(number_format($uc->amount, 2), false); ?></td>
                                                    <td style="color:black;"><b>$<?php echo e(number_format($uc->current_value, 2), false); ?></b></td>
                                                    <td><?php echo e($uc->created_at->diffForHumans(), false); ?></td>
                                                    <td><?php if($uc->status == 0): ?>
                                                        <span class="badge badge-warning">Confirmation Requested</span><br>
                                                        <small>Pay <b><?php echo e($uc->amount * \App\Setting::first()->usd_bitcoin, false); ?> btc</b> to <b><?php if($uc->paid_to != null): ?> <?php echo e($uc->paid_to, false); ?> <?php else: ?> <?php echo e(\App\Setting::first()->bitcoin_wallet_id, false); ?> <?php endif; ?></b></small>
                                                        <?php elseif($uc->status == 1): ?>
                                                        <span class="badge badge-warning">Yielding Interest (<?php echo e($uc->days, false); ?>)</span>
                                                        <?php elseif($uc->status == 2): ?>
                                                        <span class="badge badge-primary">Payout Requested</span>
                                                        <?php elseif($uc->status == 3): ?>
                                                        <span class="badge badge-success">Paid</span>
                                                        <?php else: ?>
                                                        <span class="badge badge-danger">Failed</span>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <tr>
                                                    <td colspan="5"><center><i><b>You have no active investments yet</b></i></center></td>
                                                </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            <hr>
                            <div class="card">
                                <div class="card-header">News and Information</div>
                                <div class="card-body">
                                    <div class="table-responsive" style="height: 200px;">
                                        <ul>
                                            <?php $__empty_1 = true; $__currentLoopData = \App\Post::latest()->limit(20)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <li style="border-bottom: 1px solid #e4e1e1; margin-bottom:10px;"><b>-</b> <a href="/blog/<?php echo e($news->url, false); ?>"><?php echo e($news->title, false); ?></a><?php if($news->created_at->isToday()): ?> <small style="color:red;"><b>*NEW*</b></small> <?php endif; ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <center>
                                                <br>
                                                <i>No recent news articles. We are sure to keep you updated on recent activities</i>
                                            </center>
                                            <?php endif; ?>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /rw -->
            </div><!-- /col-lg-9 END SECTION MIDDLE -->
        </div>
    </section>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>