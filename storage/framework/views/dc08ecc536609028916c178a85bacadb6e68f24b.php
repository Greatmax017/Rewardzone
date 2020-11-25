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
        <div class="row">
            <br>
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header">Inbox</div>
                    <div class="card-body">
                        <div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Subject</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><a href="<?php echo e(url('/message/'.$m->id), false); ?>" <?php if($m->message_read == 0): ?> style="font-weight:900;" <?php endif; ?>><?php echo e(isset($m->subject) ? $m->subject : '', false); ?></a></td>
                                        <td><span <?php if($m->message_read == 0): ?> style="font-weight:900;" <?php endif; ?>><?php echo e($m->created_at->diffForHumans(), false); ?></span> <br><small><?php echo e($m->created_at->toDayDateTimeString(), false); ?></small></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="3"><center><i>No messages in your inbox</i></center></td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                            <?php echo e($messages->links(), false); ?>

                        </div>
                    </div>
                </div>
                <hr>
                <div class="card">
                    <div class="card-header">Sent Messages
                        <a href="<?php echo e(url('/message'), false); ?>" class="btn btnsm btn-warning float-right">
                            <i class="fa fa-plus"></i> New Message
                        </a>
                    </div>
                    <div class="card-body">
                        <div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Subject</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $messages_sent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><a href="<?php echo e(url('/message/'.$m->id), false); ?>"><?php echo e(isset($m->subject) ? $m->subject : '', false); ?></a></td>
                                        <td><?php echo e($m->created_at->toDayDateTimeString(), false); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="3"><center><i>You have not sent any messages yet</i></center></td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /row -->
    </div><!-- /col-lg-9 END SECTION MIDDLE -->
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>