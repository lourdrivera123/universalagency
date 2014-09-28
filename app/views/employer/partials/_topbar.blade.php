    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <!-- Search Box -->
                    <div class="searchbox">
                        <form action="#" method="get">
                            <input type="text" class="searchbox-inputtext" id="searchbox-inputtext" name="s" placeholder="Search.."/>
                            <label class="searchbox-icon" for="searchbox-inputtext"></label>
                            <input type="submit" class="searchbox-submit" value="Search"/>
                        </form>
                    </div>
                    <!-- //Search Box// -->
                    <div class="social-icons" style="padding-top:1%;">

                        <ul>

                            @if(Auth::guest())
                            <li>
                                <a href="{{ URL::to('signup') }}"><h5>Sign up </h5></a>
                            </li>
                            <li>
                                <a href="{{ URL::to('signin') }}"><h5>Sign in &nbsp; | &nbsp;</h5></a>
                            </li>
                            @endif

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>