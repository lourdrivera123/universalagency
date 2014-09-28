<!DOCTYPE html>

<html class="no-js">
<head>
    <meta charset="utf-8">
    @yield('title')
    @yield('description')

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @include('applicant.partials._styles')

    @yield('additional_styles')

</head>
<body class="bgpattern-shattered">

    <div id="wrapper" class="boxed">

        <div class="top_wrapper">

            @yield('toptitlebar')

        </div><!--.top wrapper end -->

        <div class="loading-container">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>

        @yield('body')

        @yield('modals')

        @include('applicant.partials._footer')

    </div>
    
    @yield('scripts')

</body>
</html>
