<?php
Route::get('/', array(
	'as' => 'home',
	'uses' => 'HomeController@home',
	//'uses' => 'AppController@app',
));

// unautheticated group
Route::group(array('before' => 'guest'), function() {

	// CSRF protection group nested in the guest group
	Route::group(array('before' => 'csrf'), function() {
		
		// create account POST
		Route::post('/account/create', array(
			'as' 	=> 'account-create-post',
			'uses' 	=> 'accountController@postCreate'
		));

		// sign In POST
		Route::post('/account/signin', array(
			'as' 	=> 'account-sign-in-post',
			'uses' 	=> 'accountController@postSignIn'
		));
	});

	// sign In GET
	Route::get('/account/signin', array(
			'as' 	=> 'account-sign-in',
			'uses' 	=> 'accountController@getSignIn'
		));

	// create account GET
	Route::get('/account/create', array(
		'as' 	=> 'account-create',
		'uses' 	=> 'accountController@getCreate'
	));

	// account activation page with unique code
	Route::get('/account/activate/{code}', array(
			'as' 	=> 'account-activate',
			'uses' 	=> 'accountController@getActivate'
		));

	// account logout
	/*
	Route::get('/account/logout', array(
			'as' 	=> 'account-sign-out',
			'uses' 	=> 'accountController@getLogout'
		));
	*/
});





