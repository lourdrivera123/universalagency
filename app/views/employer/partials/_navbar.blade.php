<!-- Header -->
<header id="header">
    <div class="container">

        <div class="row header">

            <!-- Logo -->
            <div class="col-xs-2 logo" style="padding-bottom:15px;">
                <a href="home">
                    <img src="{{ URL::asset('images/main_logo.png') }}" alt="Kanzi HTML5 Template" />
                </a>
            </div>
            <!-- //Logo// -->


            <!-- Navigation File -->
            <div class="col-md-10">

                <!-- Mobile Button Menu -->
                <div class="mobile-menu-button">
                    <i class="fa fa-list-ul"></i>
                </div>
                <!-- //Mobile Button Menu// -->

                <nav>
                    <ul class="navigation">
                        <li>
                            <a href="home">
                                <span class="label-nav">
                                    Home
                                </span>
                            </a>
                        </li>
                        
                        <li>
                            <a href="javascript:void(0)">
                                <span class="label-nav">
                                    Must-Reads
                                </span>
                            </a>
                            <ul>
                                <li>
                                    <a href="about-us.html"> About </a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('features') }}"> Features </a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('faq') }}"> FAQ </a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('contact') }}">Contact Us </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="portfolio-two-columns.html">
                             <span class="label-nav">
                                Job Board
                            </span>
                            <span class="label-nav-sub" data-hover="Available jobs">
                                Available jobs
                            </span>
                        </a>
                    </li>

                    @if(!Auth::guest())
                    <li>
                        <a href="{{ URL::to('loggedin') }}"><span class="label-nav"><i class="fa fa-user"></i> {{ Auth::user()->employer()->first()->businessname }} </span></a>
                        <ul>
                            <li><a href="{{ URL::to('employerchangepassword') }}"> <i class="fa fa-edit"> </i>Change Password </a></li>
                            <li><a href="{{ URL::to('signout') }}"> <i class="fa fa-sign-out"> </i>Logout </a></li>
                        </ul>
                    </li>
                    @endif
                </ul>

            </nav>

            <!-- Mobile Nav. Container -->
            <ul class="mobile-nav">
                <li class="responsive-searchbox">
                    <!-- Responsive Nave -->
                    <form action="#" method="get">
                        <input type="text" class="searchbox-inputtext" id="searchbox-inputtext-mobile" name="s" />
                        <button class="icon-search"></button>
                    </form>
                    <!-- //Responsive Nave// -->
                </li>
            </ul>
            <!-- //Mobile Nav. Container// -->
        </div>
        <!-- Nav -->

    </div>



</div>
</header>