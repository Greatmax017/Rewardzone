<?php $__env->startSection('content'); ?>

<!-- banner -->
<div class="inner_page-banner">
</div>
<!--//banner -->
<!-- short -->
<div class="using-border py-3">
    <div class="inner_breadcrumb  ml-4">
        <ul class="short_ls">
            <li>
                <a href="<?php echo e(url('/'), false); ?>">Home</a>
                <span>/</span>
            </li>
            <li>
                <a href="<?php echo e(url('/dashboard'), false); ?>">Dashboard</a>
                <span>/</span>
            </li>
            <li>Referral Panel</li>
        </ul>
    </div>
</div>
<!-- //short-->
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
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Referral/Affiliate</div>
                    <div class="card-body table-responsive">
                        <div>
                            <b>Total users referred:</b> <?php echo e($ref_count, false); ?><br>
                            <br>
                            <br>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($m->name, false); ?></td>
                                        <td><?php echo e($m->email, false); ?></td>
                                        <td><?php echo e($m->phone, false); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="3"><center><i>You have not referred anyone. share your referral link to get referral bonus</i></center></td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                            <?php echo e($users->links(), false); ?>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="alert">
                                        <p class="text-center">Your Referral Link is
                                            <a href="<?php echo e(url('/register').'?ref='.Auth::user()->email, false); ?>" style="word-wrap:break-word;"><b><?php echo e(url('/register').'?ref='.Auth::user()->name, false); ?></b></a>
                                        </p>
                                    </div>
                                </div class="col-lg-12">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /row -->
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>