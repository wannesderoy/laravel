<?php
// home route
Route::get('/', array(
	'as' => 'home',
	'uses' => 'HomeController@home'
));

// user profile route
Route::get('/user/{username}', array(
	'as'	=>'profile-user',
	'uses'	=>'ProfileController@user'
)); 

/*
//-- authenticated group --\\
*/
Route::group(array('before' => 'auth'), function() {

	// csrf protection group for authenticated users
	Route::group(array('before' => 'csrf'), function() {
		
		// post method for changing the password
		Route::post('account/changepassword', array(
				'as'	=> 'account-changepassword',
				'uses'	=> 'accountController@postChangePassword'
			));
		// Post method for editing personal info for the user
		Route::post('account/edit', array(
				'as'	=> 'account-editinfo',
				'uses'	=> 'accountController@postEditInfo'
			));
		Route::post('account/profile-picture', array(
				'as'	=>'account-profile-picture',
				'uses'	=>'accountController@postProfilePicture'
			));
		Route::post('account/photo-album', array(
				'as'	=>'account-photo-album',
				'uses'	=>'formController@formSubmit'
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
	// edit info
	Route::get('/account/edit', array(
			'as'	=> 'account-editinfo',
			'uses'	=> 'accountController@getEditInfo'
		));
	Route::get('account/profile-picture', array(
				'as'	=>'account-profile-picture',
				'uses'	=>'accountController@getProfilePicture'
			));
	Route::get('account/photo-album', array(
				'as'	=>'account-photo-album',
				'uses'	=>'accountController@getPhotoAlbum'
			));
});

/*
//-- unautheticated group --\\
*/
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

		// forgot password POST
		Route::post('/account/forgot-password', array(
			'as'	=>'account-forgot-password-post',
			'uses'	=>'accountController@postForgotPassword'
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

	// forget password GET
	Route::get('/account/forgot-password', array(
			'as'	=>'account-forgot-password',
			'uses'	=>'accountController@getForgotPassword'
		));
	 
	// recover password route with unique code
	Route::get('/account/recover/{code}', array(
			'as' 	=> 'account-recover',
			'uses' 	=> 'accountController@getRecover'
		));
});





