@extends('layouts.app')

@section('content')
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
            <h3 class="tittle mb-sm-2">Our Exclusive Services</h3>
            <p>CashSpring offers the following services</p>
        </div>
        <div class="what-grids">
            <div class="row">
                <div class="col-md-6 what-grid1">
                    <div class="row what-top">
                        <div class="col-2 what-left">
                            <i class="fas fa-key"></i>
                        </div>
                        <div class="col-10 what-right">
                            <h4>Networking</h4>
                            <p class="mt-2">Cashspring utilizes the power of networking to create wealth among memebers</p>
                        </div>
                    </div>
                    <div class="row what-top my-md-5 my-4">
                        <div class="col-2 what-left">
                            <i class="far fa-money-bill-alt"></i>
                        </div>
                        <div class="col-10 what-right">
                            <h4>Empowerment</h4>
                            <p class="mt-2">We have highly skilled and experienced proffessional in different fields who gives in-depth training to our members in different fields.
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
                            <h4>Scholarship</h4>
                            <p class="mt-2">We give student scholarship to our members who wish to study overseas every year .</p>
                        </div>
                    </div>
                    <div class="row what-top my-md-5 my-4">
                        <div class="col-2 what-left">
                            <i class="fas fa-wrench"></i>
                        </div>
                        <div class="col-10 what-right">
                            <h4>Community Development Programs</h4>
                            <p class="mt-2">We hold community development programs to bring up talented youths to the limelight</p>
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
            <h3 class="tittle mb-2 text-white">Packages</h3>
            <p class="test-title-paara">Our investment plans with no risks</p>
        </div>
        <div class="inner-sec">
            <div class="card-deck text-center row mt-5">
                <div class="price-info-grid col-lg-4">
                    <div class="price-inner">
                        <div class="price-header">
                            <h4>Cycle 1</h4>
                        </div>
                        <div class="price-body">
                            <h5 class="pricing-title">
                                <span class="dolor">&#8358;</span> 3,000.00
                                <label>Minimum Investment</label>

                            </h5>

                            <ul class="list-unstyled mt-3 mb-4">
                                <li class="py-2 border-bottom">&#8358;10,000 Returns</li>
                                <li class="py-2 border-bottom">2 x 2</li>
                                <li class="py-2">-</li>
                            </ul>
                            <a class="btn btn-block btn-outline-primary py-2"  @guest href="#" data-toggle="modal" data-target="#exampleModalCenter2" @else href="{{ url('/dashboard') }}" @endauth>
                                <i class="far fa-user"></i> Get Started</a>
                        </div>
                    </div>
                </div>
                <div class="price-info-grid col-lg-4 my-lg-0 my-3">
                    <div class="price-inner">
                        <div class="price-header">
                            <h4>Cycle 2</h4>
                        </div>
                        <div class="price-body">
                            <h5 class="pricing-title">
                                <span class="dolor">&#8358;</span>5,000.00
                                <label>Min Investment</label>
                            </h5>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li class="py-2 border-bottom">&#8358;15,000 Returns</li>
                                <li class="py-2 border-bottom">2 x 2</li>
                                <li class="py-2">-</li>
                            </ul>
                            <a class="btn btn-block btn-outline-primary py-2" @guest href="#" data-toggle="modal" data-target="#exampleModalCenter2" @else href="{{ url('/dashboard') }}" @endauth>
                                <i class="far fa-user"></i> Get Started</a>
                        </div>
                    </div>
                </div>
                <div class="price-info-grid col-lg-4">
                    <div class="price-inner">
                        <div class="price-header">
                            <h4>Maximalist</h4>
                        </div>
                        <div class="price-body">
                            <h5 class="pricing-title">
                                <span class="dolor">&#8358;</span>10,000.00
                                <label>Min Investment</label>

                            </h5>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li class="py-2 border-bottom">&#8358;30,000 Returns</li>
                                <li class="py-2 border-bottom">2 x 2</li>
                                <li class="py-2">-</li>
                            </ul>
                            <a class="btn btn-block btn-outline-primary py-2" @guest href="#" data-toggle="modal" data-target="#exampleModalCenter2" @else href="{{ url('/dashboard') }}" @endauth>
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
                <h4>Our current Statistics</h4>
                <h6 class="mt-3 mb-5">Numbers don't lie! </h6>
                <div class="row mb-xl-5 mb-4">
                    <div class="col-6 w3layouts_stats_left w3_counter_grid">
                        <i class="fas fa-user"></i>
                        <p class="counter">{{ \App\User::count() + 720 }}</p>
                        <p class="para-text-w3ls">Registered Investors</p>
                    </div>
                    <div class="col-6 w3layouts_stats_left w3_counter_grid2">
                        <i class="fas fa-money-bill-alt"></i>
                        <p class="counter">{{ \App\Transaction::count() + 1320 }}</p>
                        <p class="para-text-w3ls">Active Investments</p>
                    </div>
                </div>
                <p>All our activities are transparent and automated so why not Join. There are no third parties and your withdrawal is automatically delivered to your bank account.</p>
            </div>
            <div class="col-lg-6 text-lg-left text-center mt-lg-0 mt-md-5 mt-4">
                <img src="{{ url('/images/middle.jpg') }}" alt="" class="img-fluid" />
            </div>
        </div>
    </div>
</div>
<!-- //stats -->
@endsection
