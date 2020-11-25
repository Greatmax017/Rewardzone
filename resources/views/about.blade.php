@extends('layouts.app')

@section('content')
<!--about-->
<!--about-one-->
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
<section class="about-inner py-lg-4 py-md-3 py-sm-3 py-3">
    <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
        <h3 class="title text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">About Us</h3>
        <div class="row abt-inner-agile">
            <div class="col-lg-6 inner-about-left">
                <div class="abut-fst-img">
                    <img src="{{ url('/images/middle.jpg') }}" alt=" " class="img-fluid img-thumbnail">
                </div>
            </div>
            <div class="col-lg-6 sub-agile-abt-txt text-justify">
                <p>Digimexcrypto is a Binance operated investment platform which has been operating since 2012 and is immune to any sanction whatsoever from any source as a result of worldwide registration acceptance of this platform

Investments are traded daily by the investment platform in other trading platform and websites,therefore profits are generated daily for both platform and users

It is an internationally accepted investment platform with high insurance policies to secure all investments made to the site

<br>

                    <b>Coiner Plan</b><br>
                    $100 - $1000 Investment.
                    30% ROI AFTER 4DAYS.<br>

                    <b>Flip Plan</b><br>
                    $1,000 - $10,000 Investment.
                    60% ROI AFTER 4DAYS.<br>

                    <b>Maximalist Plan</b><br>
                    $10,000 - $30,000 Investment.
                    80% ROI AFTER 4DAYS.<br>

                    <br>Digimexcrypto offers a maximum deposit of $30,000.00 per day, Internet Protocol (IP) Address is being detected for any device.<br>
                </p>
                </div>
            </div>
        </div>
        <!--//about-one-->
        <!--about-two-->
        <div class="container pb-lg-5 pb-md-4 pb-sm-4 pb-3">
            <div class="row">
                <div class="sub-agile-abt-txt col-lg-6 text-left">
                    <p>
                        <br><b>HOW TO INVEST</b><br>
                        Choose a plan suitable for you, get the payment address pay and get credited and wait for your due date to receive both your principal and
                        profit<br>
                        MINIMUM FOR SINGLE INVESTMENT $100.00.<br>
                        MAXIMUM FOR SINGLE INVESTMENT $30,000.00.<br>
                        All Payments are done automatically and investment validity is 1hr after receipt of unique Wallet address.
                        <br>

                        <br><b>REFERRAL BONUSES</b><br>
                        Digimexcrypto pays referral bonus to investors who are ready and willing to work for the company to earn a little out of their investment.
                        5% Referral Bonus.
                    </p>
                    <br>
                    <div class="abut-fst-img">
                        <img src="{{ url('/images/bb2.jpg') }}" alt=" " class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-6 sub-inner-abt-txt text-left">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                                <b>OUR SERVICES</b><br>
                                We invest in so many huge trading and investment that will enable the sustainability of the company.
                                these are the trading services the company operates on:<br><br>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <div class="sub-agile-abt-txt">
                                <h5>GOLD TRADING</h5>
                                <p class="pt-lg-3 pt-md-3 pt-2 text-justify">We have highly skilled and experienced
                                    traders in the local market and international markets handling the import,
                                    export, sale, purchase and actual trading of gold as well as comprehensive
                                    consulting services to our trading partners and investors in which bitcoin
                                    serves as a means of exchange in trading.</p>
                            </div>
                            <div class="sub-agile-abt-txt mt-md-4 mt-3">
                                <h5>FOREX TRADING</h5>
                                <p class="pt-lg-3 pt-md-3 pt-2 text-justify">Using AVA TRADE BY our specialists in the field are online 24/7 to monitor trades.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="sub-agile-abt-txt">
                                <h5>HUGE BITCOIN MINING</h5>
                                <p class="pt-lg-3 pt-md-3 pt-2 text-justify">We Monitor and invest huge quantities of bitcoin into mining progams to get high yield in return .</p>
                            </div>
                            <div class="sub-agile-abt-txt mt-md-4 mt-3">
                                <h5>COMMUNITY DEVELOPMENT PROGRAMS</h5>
                                <p class="pt-lg-3 pt-md-3 pt-2 text-justify">We buy in large quantities from the community in which its kept till there is a rise in crypto
                                    currency then we sell in high quantity.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--//about-two-->
    </section>
    <!--//about-->

    @endsection
