<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

// $quotes = Quote::all();

// View::share('quotes', $quotes);

// $faqs = Faq::whereStatus(0)->count();

// View::share('faqs', $faqs);

// $jobs = Job::all();
// View::share('jobs', $jobs);

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest())
	{
		if (Request::ajax())
		{
			return Response::make('Unauthorized', 401);
		}
		else
		{
			return Redirect::guest('signin');
		}
	}
});

Route::filter('auth.basic', function()
{
	return Auth::basic();
});



/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});

Route::filter('role', function($route, $request, $role)
{
	// dd(Auth::user()->roles()->first()->name);
	if (Auth::guest() or ! Auth::user()->hasRole($role))
	{
		if($role == 'admin')
		{
			return Redirect::guest('adminlogin');	

		} else if($role == 'applicant') {
			
			return Redirect::guest('signin');
		
		} else if($role == 'employer'){
			
			return Redirect::guest('signin');
		
		} else if($role == 'staff'){

			return Redirect::guest('signin');
		
		} else {
		
			return Response::make('Unauthorized', 401);
		
		}
	}

});
