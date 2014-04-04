<?php
Route::get('/', array(
	'as' => 'home',
	'uses' => 'HomeController@home',
	//'uses' => 'AppController@app',
));

//-- authenticated group --\\
Route::group(array('before' => 'auth'), function() {

	// csrf protection group for authenticated users
	Route::group(array('before' => 'csrf'), function() {
		
		// post method for changing the password
		Route::post('account/changepassword', array(
				'as'	=> 'account-changepassword',
				'uses'	=> 'accountController@postChangePassword'
			));
	});

	// account logout
	Route::get('/account/sign-out', array(
			'as' 	=> 'account-sign-out',
			'uses' 	=> 'accountController@getSignOut'
		));

	// change password
	Route::get('/account/changepassword', array(
			'as' 	=> 'account-changepassword',
			'uses'	=> 'accountController@getChangePassword'
		));
});

//-- unautheticated group --\\
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
});





