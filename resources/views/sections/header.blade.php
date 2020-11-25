<!--=== Header ===-->
<div class="header">
    <div class="container">
        <!-- Logo -->
        <a class="logo" href="{{ url('/') }}">
            <img src="{{ url('/img/10in10-logo.png') }}" alt="Logo">
        </a>
        <!-- End Logo -->
        <!-- Topbar -->
        <div class="topbar">
            <ul class="loginbar pull-right">
                @if (Auth::guest())
                <li><a href="{{ url('/register') }}">Register</a></li>
                <li class="topbar-devider"></li>
                <li><a href="{{ url('/login') }}">Login</a></li>
                @else
                <li><a href="{{ url('/dashboard') }}">Dashboard1</a></li>
                @if(Auth::user()->isAdmin() || Auth::user()->isReader())
                <li class="topbar-devider"></li>
                <li><a href="{{ url('/admin') }}">Admin Panel</a></li>
                @endif
                <li class="topbar-devider"></li>
                <li><a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                @endif
            </ul>
        </div>
        <!-- End Topbar -->

        <!-- Toggle get grouped for better mobile display -->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="fa fa-bars"></span>
        </button>
        <!-- End Toggle -->
    </div><!--/end container-->

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse mega-menu navbar-responsive-collapse">
        <div class="container">
            <ul class="nav navbar-nav">
                <!-- Home -->
                <li class="active">
                    <a href="{{ url('/') }}">
                        Home
                    </a>
                </li>
                <!-- End Home -->

                <!-- Pages -->
                <li>
                    <a href="{{ url('/about') }}">
                        About
                    </a>
                </li>
                <!-- End Pages -->

                <!-- Pages -->
                <li>
                    <a href="{{ url('/services') }}">
                        Services
                    </a>
                </li>
                <!-- End Pages -->

                <!-- Blog -->
                <li>
                    <a href="{{ url('/contact') }}">
                        Contact
                    </a>
                </li>
                <!-- End Blog -->

                <!-- Search Block -->
                <li>
                    <i class="search fa fa-search search-btn"></i>
                    <div class="search-open">
                        <div class="input-group animated fadeInDown">
                            <input type="text" class="form-control" placeholder="Search">
                            <span class="input-group-btn">
                                <button class="btn-u" type="button">Go</button>
                            </span>
                        </div>
                    </div>
                </li>
                <!-- End Search Block -->
            </ul>
        </div><!--/end container-->
    </div><!--/navbar-collapse-->
</div>
<!--=== End Header ===-->
