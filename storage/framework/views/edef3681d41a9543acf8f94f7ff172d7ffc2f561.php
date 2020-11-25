<!--=== Footer Version 1 ===-->
<div class="footer-v1">
    <div class="footer">
        <div class="container">
            <div class="row">
                <!-- About -->
                <div class="col-md-3 md-margin-bottom-40">
                    <a href="index.html"><img id="logo-footer" class="footer-logo" src="/assets/img/logo1-default.png" alt=""></a>
                    <p>Today Lift is providing better business aid and opportunities for everyone. We have the formula for comfortable living</p>
                </div><!--/col-md-3-->
                <!-- End About -->

                <!-- Latest -->
                <div class="col-md-3 md-margin-bottom-40">
                    <div class="posts">
                        <div class="headline"><h2>Latest News</h2></div>
                        <ul class="list-unstyled latest-list">
                            <?php $__currentLoopData = App\Post::where('tutorial', 0)->latest()->limit(4)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<li>
									<a href="/blog/<?php echo e($p->url); ?>"><?php echo e($p->title); ?></a>
									<small><?php echo e($p->created_at->toFormattedDateString()); ?></small>
								</li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div><!--/col-md-3-->
                <!-- End Latest -->

                <!-- Link List -->
                <div class="col-md-3 md-margin-bottom-40">
                    <div class="headline"><h2>Useful Links</h2></div>
                    <ul class="list-unstyled link-list">
                        <li><a href="/about">About us</a><i class="fa fa-angle-right"></i></li>
                        <li><a href="/register">Register</a><i class="fa fa-angle-right"></i></li>
                        <li><a href="/login">Login</a><i class="fa fa-angle-right"></i></li>
                        <li><a href="faq">Faqs</a><i class="fa fa-angle-right"></i></li>
                        <li><a href="/contact">Contact us</a><i class="fa fa-angle-right"></i></li>
                    </ul>
                </div><!--/col-md-3-->
                <!-- End Link List -->

                <!-- Address -->
                <div class="col-md-3 map-img md-margin-bottom-40">
                    <div class="headline"><h2>Contact Us</h2></div>
                    <address class="md-margin-bottom-40">
                        25, Grand Street, ikeja <br />
                        Lagos, Nigeria <br />
                        Phone: <a href="tel:08167863189"> +2348167863189</a>  <br />
                        Email: <a href="mailto:support@todaylift.com" class="">support@todaylift.com</a>
                    </address>
                </div><!--/col-md-3-->
                <!-- End Address -->
            </div>
            <br />
         <center> <a href="https://www.simplepay.ng"> <img  height="130" width="308" src="/asset/img/powered_vertical_light_ivdatw.png"></a></center>
        </div>
    </div><!--/footer-->


    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>
                        2017 &copy; Today Lift.
                        <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a>
                    </p>
                </div>

                <!-- Social Links -->
                <div class="col-md-6">
                    <ul class="footer-socials list-inline">
                        <li>
                            <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Skype">
                                <i class="fa fa-skype"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Google Plus">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Linkedin">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Pinterest">
                                <i class="fa fa-pinterest"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Dribbble">
                                <i class="fa fa-dribbble"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End Social Links -->
            </div>
        </div>
    </div><!--/copyright-->
</div>
<!--=== End Footer Version 1 ===-->
