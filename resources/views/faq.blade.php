@extends('layouts.app')

@section('content')
<style>
p{
    text-align: justify;
}
</style>

<!-- banner -->
<div class="inner_page-banner">
</div>
<!--//banner -->
<!-- short -->
<div class="using-border py-3">
    <div class="inner_breadcrumb  ml-4">
        <ul class="short_ls">
            <li>
                <a href="{{ url('/') }}">Home</a>
                <span>/</span>
            </li>
            <li>FAQs</li>
        </ul>
    </div>
</div>
<!-- //short-->
<!--about-->
<!--about-one-->
<section class="about-inner py-lg-4 py-md-3 py-sm-3 py-3"><!--End of Tawk.to Script-->
    <div class="container">
        <div class="parallax filter-gradient blue" data-color="blue">
            <div class= "container">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="description text-center">
                            <h3>Frequently Asked Questions (FAQs)</h3><br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="bg-color-light mt-4 col-sm-6">
                <div class="container content-sm">
                    <div class="headline-center-v2 headline-center-v2-dark">
                        <h5>What Is BITLIFETRADING INVESTMENT COMPANY?</h5>
                        <p>BITLIFETRADING INVESTMENT COMPANY is a professional investment corporation engaged in stock market, foreign exchange market, Forex Trade and gold trading etc.
                            UK Registration 11335831 & Head Office located at 4 Stamford Hill, Cazenove, London United Kingdom, N16 6XZ.
                        </p>
                    </div>
                </div>
            </div>
            <div class="bg-color-light mt-4 col-sm-6">
                <div class="container content-sm">
                    <div class="headline-center-v2 headline-center-v2-dark">
                        <h5>How Can I Invest With BITLIFETRADING INVESTMENT COMPANY?</h5>
                        <p>To make an investment you must first become a member of BITLIFETRADING INVESTMENT COMPANY*.
                            Once you are signed up, you can make your first deposit. All deposits must be made through the
                            Members Area. You can login using the member username and password you receive when signup.</p>
                    </div>
                </div>
            </div>
            <div class="bg-color-light mt-4 col-sm-6">
                <div class="container content-sm">
                    <div class="headline-center-v2 headline-center-v2-dark">
                        <h5>I Wish To Invest With BITLIFETRADING INVESTMENT COMPANY But I Don't Have bitcoin Account. What Should I Do?</h5>
                        <p>You can open a free bitcoin account here: <a href="https://www.blockchain.info">www.blockchain.info</a> 
                        </p>
                    </div>
                </div>
            </div>
            <div class="bg-color-light mt-4 col-sm-6">
                <div class="container content-sm">
                    <div class="headline-center-v2 headline-center-v2-dark">
                        <h5>How Do I Open My BITLIFETRADING INVESTMENT TRADING Account?</h5>
                        <p>It's quite easy and convenient. Click on the <a href="{{ url('/register') }}">sign up</a>, fill in the registration form and then press "Sign Up".
                        </p>
                    </div>
                </div>
            </div>
            <div class="bg-color-light mt-4 col-sm-6">
                <div class="container content-sm">
                    <div class="headline-center-v2 headline-center-v2-dark">
                        <h5>Which E-Currencies Do You Accept?</h5>
                        <p>We accept only Bitcoin for now.</p>
                    </div>
                </div>
            </div>
            <div class="bg-color-light mt-4 col-sm-6">
                <div class="container content-sm">
                    <div class="headline-center-v2 headline-center-v2-dark">
                        <h5>How Can I Withdraw Funds? </h5>
                        <p>Withdrawal is is not done in BITLIFETRADING INVESTMENT because withdrawal is automatic and not manual which means on your validity date u get credited within 24hrs</p>
                    </div>
                </div>
            </div>
            <div class="bg-color-light mt-4 col-sm-6">
                <div class="container content-sm">
                    <div class="headline-center-v2 headline-center-v2-dark">
                        <h5>How Long Does It Take For My Deposit To Be Added To My Account? </h5>
                        <p>Your account will be updated as fast as possible withing 24hrs duration.</p>
                    </div>
                </div>
            </div>
            <div class="bg-color-light mt-4 col-sm-6">
                <div class="container content-sm">
                    <div class="headline-center-v2 headline-center-v2-dark">
                        <h5>Can I Lose Money By Investing Here? </h5>
                        <p>No, you will not lose money. We make every effort to ensure the safety of your assets.</p>
                    </div>
                </div>
            </div>
            <div class="bg-color-light mt-4 col-sm-6">
                <div class="container content-sm">
                    <div class="headline-center-v2 headline-center-v2-dark">
                        <h5>How Can I Change My E-Mail Address Or Password? </h5>
                        <p>Log into your BITLIFETRADING INVESTMENT account and click on the "Account Information". You can change your e-mail address and password there.</p>
                    </div>
                </div>
            </div>
            <div class="bg-color-light mt-4 col-sm-6">
                <div class="container content-sm">
                    <div class="headline-center-v2 headline-center-v2-dark">
                        <h5>What If I Can't Log Into My Account Because I Forgot My Password? </h5>
                        <p>Click forgot password link, type your e-mail and you'll receive a password reset link in your registered email. follow the link to reset your password.</p>
                    </div>
                </div>
            </div>
            <div class="bg-color-light mt-4 col-sm-6">
                <div class="container content-sm">
                    <div class="headline-center-v2 headline-center-v2-dark">
                        <h5>Does A Daily Profit Paid Directly To My Currency Account? </h5>
                        <p>No, profits are gathered on your BITLIFETRADING account and wait for crediting.</p>
                    </div>
                </div>
            </div>
            <div class="bg-color-light mt-4 col-sm-6">
                <div class="container content-sm">
                    <div class="headline-center-v2 headline-center-v2-dark">
                        <h5>How Do You Calculate The Interest On My Account?</h5>
                        <p>Depending on each plan. Interest on your BITLIFETRADING account is acquired in your validity plan days you choose when registering and credited to your
                            Bitcoin wallet account at the end of the validity days.
                        </p>
                    </div>
                </div>
            </div>
            <div class="bg-color-light mt-4 col-sm-6">
                <div class="container content-sm">
                    <div class="headline-center-v2 headline-center-v2-dark">
                        <h5>Can I Reinvestment on the account?</h5>
                        <p>No you cannot because payment is made to your Bitcoin wallet Automatic.
                        </p>
                    </div>
                </div>
            </div>
            <div class="bg-color-light mt-4 col-sm-6">
                <div class="container content-sm">
                    <div class="headline-center-v2 headline-center-v2-dark">
                        <h5>Can I Make An Additional Deposit To BITLIFETRADING INVESTMENT Account Once It Has Been Opened?</h5>
                        <p>Yes, you can but all transactions are handled separately.
                        </p>
                    </div>
                </div>
            </div>
            <div class="bg-color-light mt-4 col-sm-6">
                <div class="container content-sm">
                    <div class="headline-center-v2 headline-center-v2-dark">
                        <h5>Can I Lose Money?</h5>
                        <p>There is a risk involved with investing in all high yield investment programs. However, there are a few simple
                            ways that can help you to reduce the risk of losing more than you can afford to. First, align your investments
                            with your financial goals, in other words, keep the money you may need for the short-term out of more
                            aggressive investments, reserving those investment funds for the money you intend to raise over the
                            long-term. It's very important for you to know that we are real traders and that we invest members'
                            funds on major investments.
                        </p>
                    </div>
                </div>
            </div>
            <div class="bg-color-light mt-4 col-sm-6">
                <div class="container content-sm">
                    <div class="headline-center-v2 headline-center-v2-dark">
                        <h5>May I Open Several Accounts In Your Program?</h5>
                        <p>No. If we find that one member has more than one account, the entire funds will be frozen.
                        </p>
                    </div>
                </div>
            </div>
            <div class="bg-color-light mt-4 col-sm-6">
                <div class="container content-sm">
                    <div class="headline-center-v2 headline-center-v2-dark">
                        <h5>Who Manages The Funds?</h5>
                        <p>These funds are managed by a team of BITLIFETRADING INVESTMENT experts.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
