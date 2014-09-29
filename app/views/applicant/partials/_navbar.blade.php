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
                            <a href="{{ URL::to('home') }}">
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
                                    <a href="{{ URL::to('about') }}"> About </a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('faq') }}"> FAQ </a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('contact') }}">Contact Us </a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('termsofuse') }}">Terms and Conditions</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ URL::to('partners') }}">
                                <span class="label-nav">
                                    Our Partners
                                </span>
                                <span class="label-nav-sub" data-hover="Employers/Companies">
                                    Employers/Companies
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ URL::to('joblist') }}">
                                <span class="label-nav">
                                    Jobs
                                </span>
                                <span class="label-nav-sub" data-hover="Available jobs">
                                    Available jobs
                                </span>
                            </a>
                        </li>

                        @if(isApplicant())
                        <li>
                            <a href="{{ URL::to('messages') }}">
                                <span class="label-nav">

                                    <i class="fa fa-envelope-o fa-2x">
                                        @if( count(getUnreadMessages()) > 0 )
                                        <i class="notificationalerticon">
                                            {{  count(getUnreadMessages()) }}
                                        </i>
                                        @endif

                                    </i> 
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ URL::to('notifications') }}">
                                <span class="label-nav">
                                    <i class="fa fa-globe fa-2x">
                                    @if( count(getUnreadNotifications()) > 0 )
                                    <i class="notificationalerticon">
                                    {{ count(getUnreadNotifications()) }}
                                    </i>
                                    @endif
                                    </i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a ><span class="label-nav"><i class="fa fa-user"></i> {{ Auth::user()->resume()->first()->first_name }} </span></a>
                            <ul>
                                @if(checkresumeifcomplete())
                                <li><a href=" {{ URL::to('profile') }} "> Profile </a></li>
                                <li><a href=" {{ URL::to('create_resume') }} "> Settings </a></li>
                                @else
                                <li><a href=" {{ URL::to('create_resume') }} "> Create Resume </a></li>
                                @endif

                                <!-- <li><a href="{{ URL::to('upload_require') }}"> Upload Requirements </a></li> -->
                                <li><a href="{{ URL::to('changepassword') }}"> Change Password </a></li>
                                <li><a href="{{ URL::to('signout') }}"> <i class="fa fa-sign-out"> </i>Logout </a></li>
                            </ul>
                        </li>
                        @elseif(isEmployer())
                        <li>
                            <a href="javascript:void(0)"><span class="label-nav"><i class="fa fa-user"></i> {{ Auth::user()->employer()->first()->businessname }} </span></a>
                            <ul>
                                <li><a href="{{ URL::to('employerchangepassword') }}"> <i class="fa fa-edit"> </i>Change Password </a></li>
                                <li><a href="{{ URL::to('signout') }}"> <i class="fa fa-sign-out"> </i>Logout </a></li>
                            </ul>
                        </li>
                        @elseif(isStaff())
                        <li>
                            <a href="javascript:void(0)"><span class="label-nav"><i class="fa fa-user"></i> {{ Auth::user()->staff()->first()->first_name }} </span></a>
                            <ul>
                                <li><a href="{{ URL::to('staffchangepassword') }}"> <i class="fa fa-edit"> </i>Change Password </a></li>
                                <li><a href="{{ URL::to('signout') }}"> <i class="fa fa-sign-out"> </i>Logout </a></li>
                            </ul>
                        </li>
                        @else
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