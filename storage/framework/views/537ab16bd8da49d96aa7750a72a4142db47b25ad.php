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
            <li>
                <a href="<?php echo e(url('/messagebox'), false); ?>">Support</a>
                <span>/</span>
            </li>
            <li>Message</li>
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
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <?php if(session('error-status')): ?>
                <div class="alert alert-danger">
                    <div class="container-fluid">
                        <div class="alert-icon">
                            <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                        </div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                        </button>
                        <b>Error:</b> <?php echo e(session('error-status'), false); ?>

                    </div>
                </div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-header">Message Detail</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-condensed">
                                <tbody>
                                    <tr><td><b>Sender Name</b></td><td><?php echo e(isset($message->sender_data->name) ? $message->sender_data->name : 'Support', false); ?><br /></td></tr>
                                    <tr><td><b>Sender Email:</b></td><td><b><?php echo e(isset($message->sender_data->email) ? $message->sender_data->email : 'support@bitlifetrading.com', false); ?> <a href="<?php echo e(url('/message/reply/'.$message->id), false); ?>" class="btn btn-xs btn-warning">Reply</a></b></td></tr>
                                    <tr><td><b>Receiver Name</b></td><td> <?php echo e(isset($message->receiver_data->name) ? $message->receiver_data->name : 'Support', false); ?><br /></td></tr>
                                    <tr><td><b>Receiver Email:</b></td><td><b><?php echo e(isset($message->receiver_data->email) ? $message->receiver_data->email : 'support@bitlifetrading.com', false); ?></b></td></tr>
                                    <tr><td><b>Subject:</b></td><td><b><?php echo e(isset($message->subject) ? $message->subject : '', false); ?></b></td></tr>
                                </tbody>
                            </table>
                        </div>
                        <p><?php echo e($message->message, false); ?></p>
                        <?php if($message->attachment != null): ?>
                        <b>Attachment:</b>
                        <img class="img-responsive" src="/<?php echo e($message->attachment, false); ?>" alt="Message Attachment" />
                        <?php endif; ?>
                        <div class="form-group">
                            <div style="margin-top:20px;" class="col-md-8 offset-md-2 text-center">
                                <a href="<?php echo e(url('/messagebox'), false); ?>" class="btn btn-sm btn-warning">
                                    Return to Messages
                                </a><br /><br />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /row -->
</div><!-- /col-lg-9 END SECTION MIDDLE -->
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>