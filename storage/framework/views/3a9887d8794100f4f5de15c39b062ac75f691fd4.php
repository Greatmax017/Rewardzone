<?php $__env->startSection('content'); ?>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5dfb5d4bd96992700fcd0658/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

<!-- services -->
<div class="what-w3ls py-5" id="services">
    <div class="container py-xl-5 py-lg-3">
        <div class="text-center mb-md-5 mb-4">
            <h3 class="tittle mb-sm-2">Trading Services</h3>
            <p>digimexcrypto.com Trade in the following fields</p>
        </div>
        <div class="what-grids">
            <div class="row">
                <div class="col-md-6 what-grid1">
                    <div class="row what-top">
                        <div class="col-2 what-left">
                            <i class="fas fa-key"></i>
                        </div>
                        <div class="col-10 what-right">
                            <h4>Forex Trading</h4>
                            <p class="mt-2">Using AVA TRADE BY our specialists in the field are online 24/7 to monitor trades.</p>
                        </div>
                    </div>
                    <div class="row what-top my-md-5 my-4">
                        <div class="col-2 what-left">
                            <i class="far fa-money-bill-alt"></i>
                        </div>
                        <div class="col-10 what-right">
                            <h4>Gold Trading</h4>
                            <p class="mt-2">We have highly skilled and experienced traders in the local market and international markets handling the import, export, sale, purchase and actual trading of gold as well as comprehensive consulting services to our trading partners and investors in which bitcoin serves as a means of exchange in trading.
.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 what-grid1 my-md-0 my-4">
                    <div class="row what-top">
                        <div class="col-2 what-left">
                            <i class="far fa-building"></i>
                        </div>
                        <div class="col-10 what-right">
                            <h4>Huge Bitcoin Mining</h4>
                            <p class="mt-2">We Monitor and invest huge quantities of bitcoin into mining progams to get high yield in return .</p>
                        </div>
                    </div>
                    <div class="row what-top my-md-5 my-4">
                        <div class="col-2 what-left">
                            <i class="fas fa-wrench"></i>
                        </div>
                        <div class="col-10 what-right">
                            <h4>Community Development Programs</h4>
                            <p class="mt-2">We buy in large quantities from the community in which its kept till there is a rise in crypto currency then we sell in high quantity.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //services -->

<!-- pricing -->
<section class="pricing py-5" id="pricings">
    <div class="container py-xl-5 py-lg-3">
        <div class="text-center mb-lg-5 mb-4">
            <h3 class="tittle mb-2 text-white">Investment Plans</h3>
            <p class="test-title-paara">Our investment plans with little or no risks</p>
        </div>
        <div class="inner-sec">
            <div class="card-deck text-center row mt-5">
                <div class="price-info-grid col-lg-4">
                    <div class="price-inner">
                        <div class="price-header">
                            <h4>Coiner</h4>
                        </div>
                        <div class="price-body">
                            <h5 class="pricing-title">
                                <span class="dolor">$</span> 100.00
                                <label>Minimum Investment</label>

                            </h5>

                            <ul class="list-unstyled mt-3 mb-4">
                                <li class="py-2 border-bottom">30% Returns</li>
                                <li class="py-2 border-bottom">4 days</li>
                                <li class="py-2">Investment Bonus 5%</li>
                            </ul>
                            <a class="btn btn-block btn-outline-primary py-2"  <?php if(auth()->guard()->guest()): ?> href="#" data-toggle="modal" data-target="#exampleModalCenter2" <?php else: ?> href="<?php echo e(url('/dashboard'), false); ?>" <?php endif; ?>>
                                <i class="far fa-user"></i> Get Started</a>
                        </div>
                    </div>
                </div>
                <div class="price-info-grid col-lg-4 my-lg-0 my-3">
                    <div class="price-inner">
                        <div class="price-header">
                            <h4>Diamond</h4>
                        </div>
                        <div class="price-body">
                            <h5 class="pricing-title">
                                <span class="dolor">$</span>1000.00
                                <label>Min Investment</label>
                            </h5>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li class="py-2 border-bottom">60% Returns</li>
                                <li class="py-2 border-bottom">4 Days</li>
                                <li class="py-2">Investment Bonus 10%</li>
                            </ul>
                            <a class="btn btn-block btn-outline-primary py-2" <?php if(auth()->guard()->guest()): ?> href="#" data-toggle="modal" data-target="#exampleModalCenter2" <?php else: ?> href="<?php echo e(url('/dashboard'), false); ?>" <?php endif; ?>>
                                <i class="far fa-user"></i> Get Started</a>
                        </div>
                    </div>
                </div>
                <div class="price-info-grid col-lg-4">
                    <div class="price-inner">
                        <div class="price-header">
                            <h4>Gold</h4>
                        </div>
                        <div class="price-body">
                            <h5 class="pricing-title">
                                <span class="dolor">$</span>10000.00
                                <label>Min Investment</label>

                            </h5>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li class="py-2 border-bottom">80% Returns</li>
                                <li class="py-2 border-bottom">4 Days</li>
                                <li class="py-2">Investment Bonus 15%</li>
                            </ul>
                            <a class="btn btn-block btn-outline-primary py-2" <?php if(auth()->guard()->guest()): ?> href="#" data-toggle="modal" data-target="#exampleModalCenter2" <?php else: ?> href="<?php echo e(url('/dashboard'), false); ?>" <?php endif; ?>>
                                <i class="far fa-user"></i> Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- //pricing -->

<!-- stats section -->
<div class="middlesection-agile py-5">
    <div class="container-fluid py-xl-5 py-lg-3">
        <div class="row">
            <div class="col-lg-6 left-build-wthree aboutright-agilewthree mt-0">
                <h4>Our current Stat</h4>
                <h6 class="mt-3 mb-5">Speeding up investments with Automation </h6>
                <div class="row mb-xl-5 mb-4">
                    <div class="col-6 w3layouts_stats_left w3_counter_grid">
                        <i class="fas fa-user"></i>
                        <p class="counter"><?php echo e(\App\User::count() + 720, false); ?></p>
                        <p class="para-text-w3ls">Registered Investors</p>
                    </div>
                    <div class="col-6 w3layouts_stats_left w3_counter_grid2">
                        <i class="fas fa-money-bill-alt"></i>
                        <p class="counter"><?php echo e(\App\Transaction::count() + 1320, false); ?></p>
                        <p class="para-text-w3ls">Active Investments</p>
                    </div>
                </div>
                <p>All our activities are transparent and automated so why not invest. There are no third parties and your investment is automatically delivered to your wallet address on withdrawal.</p>
            </div>
            <div class="col-lg-6 text-lg-left text-center mt-lg-0 mt-md-5 mt-4">
                <img src="<?php echo e(url('/images/middle.jpg'), false); ?>" alt="" class="img-fluid" />
            </div>
        </div>
    </div>
</div>
<!-- //stats -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>