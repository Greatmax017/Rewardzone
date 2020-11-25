<?php $__env->startSection('content'); ?>
<!-- Inner Page Header serction end here -->
<section style="background:#eeeeee24;" class="about-inner py-lg-4 py-md-3 py-sm-3 py-3">
    <!-- Inner Page Header serction end here -->
    <div class="container py-lg-5 py-md-4 py-sm-4 py-3">

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
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header">Transaction History List</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 offset-lg-6">
                                <form method="GET" action="/transaction_history">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control" value="<?php echo e(app('request')->input('search'), false); ?>" placeholder="Transaction ID or Email">
                                        <span class="input-group-btn">
                                            <button class="btn btn-sm btn-default" type="submit">Search</button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Amount</th>
                                        <th>Desc</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e(substr($t->id, 0, 13), false); ?></td>
                                        <td>$<?php echo e(number_format($t->amount, 2), false); ?></td>
                                        <td><?php echo e($t->description, false); ?></td>
                                        <td><?php echo e($t->created_at->toDayDateTimeString(), false); ?></td>
                                        <td><b>
                                            <?php if($t->status == 0): ?>
                                            <span class="badge badge-warning">Confirmation Requested</span>
                                            <?php elseif($t->status == 1): ?>
                                            <span class="badge badge-warning">Yielding Interest (<?php echo e($t->days, false); ?>)</span>
                                            <?php elseif($t->status == 2): ?>
                                            <span class="badge badge-primary">Payout Requested</span>
                                            <?php elseif($t->status == 3): ?>
                                            <span class="badge badge-success">Paid</span>
                                            <?php else: ?>
                                            <span class="badge badge-danger">Failed</span>
                                            <?php endif; ?>
                                            </b>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="6"><center><i>No Transactions yet</i></center></td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <?php echo e($transactions->links(), false); ?>

                    </div>
                </div>
            </div>
        </div>
    </div><!-- /row -->
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>