<?php 
Class accountController extends BaseController {

//-- START OF SIGNIN --\\

	
	public function getSignIn() {
		// Make the signin view (under views/account/signin.blade.php)
		return View::make('account.signin');
	}

	// Read & validate the user username and password
	public function postSignIn() {
		$validator = Validator::make(Input::all(),
				array(
					'username' => 'required', //email field is required and (|) checked if email format
					'password' => 'required' // requires password to be filled in
					)
				);

		// if validation fails
		if($validator->fails() ) {
			return Redirect::route('account-sign-in') // redirect to signin page
					->withErrors($validator) // display the error generated by laravels validator
					->withInput(); // display given input (form email/username)
		} else { // If validation passes

			$remember =(Input::has('remember')) ? true : false ;

				$auth = Auth::attempt(array( // puts the array of checks in variable $auth
						'username' 	=> Input::get('username'), // checks if email (username) is same as in db
						'password' 	=> Input::get('password'), // checks if psswrd is the same as in db
						'active' 	=> 1 ),// checks if user is activated (via mail confirmation)
				$remember
			);
			if ($auth) { // checks if $auth is valid
				return Redirect::intended('/'); // if valid, redirect to the intended users page
			} else { // if $auth not valid
				return Redirect::route('account-sign-in') // redirects to signin page
					->with('global', 'email/password wrong, or account not activated.'); // passes this feedback to the user
			}
		} // if another error occurs or validation fails
		return Redirect::route('account-sign-in') // redirect to signin page
			->with('global', 'there was a problem signing you in.'); // passes this feedback to the user
	}
//-- END OF SIGNIN --\\

//-- START OF CHANGE PASSWORD --\\

	public function getChangePassword() { // I don't think I still need to explain these 2 lines of code...
		return View::make('account.changepassword');
	}
	public function postChangePassword() { // validate all the input from the change password form
		$validator = Validator::make(input::all(), // and put it in $validate
				array(
					'old_password'		=>'required',
					'password'			=>'required|min:3',
					'passwordrepeat'	=>'required|same:password'
					)
			);
		if($validator->fails() ) { // if validation doesn't pass return to form with error mssages
			return Redirect::route('account-changepassword')
				->with('global', 'there was a problem validating your input')
				->withErrors($validator);
		} else {
			$user = User::find(Auth::user() -> id); // if the validation passes => find the current users id

			$old_password 	=Input::get('old_password'); // put the old and the new password in variables
			$password 		=Input::get('password');

			if(Hash::check($old_password,$user->getAuthpassword())) { // check the users current password for true
				$user -> password = Hash::make($password); // hash his new password and put in $user

				if($user->save()) { // if current password check passes => save his new password
					return Redirect::route('home') // redirect to home
					->with('global', 'your password has been saved'); // with succes message
				}
			} else {
				
				return Redirect::route('account-changepassword') // if 
					->with('global', 'your old password was not right');
			}

		}
		return Redirect::route('account-changepassword') // if 
			->with('global', 'there was a BIG problem signing you in');
	}
// wannesderoy@gmail.com

//-- END OF CHANGE PASSWORD --\\

//-- START OF SIGN_OUT --\\

	public function getSignOut() {
		Auth::logout();
		return Redirect::route('home');
	}

//-- END OF SIGN-OUT --\\

//-- START OF CREATE ACCOUNT--\\

	public function getCreate() {
		// Make the create account view (under views/account/create.blade.php) 
		return View::make('account.create');
	}
	public function postCreate() {
		$validator = Validator::make(Input::all(), // puts whole array of user input in $validator
				array(
					'email' 			=> 'required|max:50|email|unique:users', // email field with all the conditions
					'username' 			=> 'required|max:20|min:3|unique:users', // username field with all the conditions
					'password' 			=> 'required|min:3|', // psswrd field with all the conditions
					'password_again' 	=> 'required|same:password' // user is required to fill in pssword twice, the same
					)
			);
		// if user input fails
		if($validator -> fails()) {
			return Redirect::route('account-create') // redirect to create account page
			->withErrors($validator) // display the error generated by laravels validator
			->withInput(); // keeps user input in certain fields (not password)

		} else {
			// create account by setting user input in variables
			$email 		= Input::get('email'); 
			$username 	= Input::get('username');
			$password 	= Input::get('password');

			// generate random activation Code
			$code = str_random(60);

			// create the user in the database with his data
			$user = User::create(array(
					'email' 	=> $email,
					'username' 	=> $username,
					'password' 	=> Hash::make($password),
					'code' 		=> $code,
					'active' 	=> 0
				)
			);
			// if user is created in database
			if($user) {
				
				// send en email as confirmation
				Mail::send('emails.auth.activate', array( // path to the data (html) to send in mail
						
						// link in mail template is route to page + unique code. The users name is also filled in
						// then create the actual mail ($message) + fill in subject. Then send mail to user email
						'link' => URL::route('account-activate', $code), 'username' => $username), function($message) use ($user) { 
						$message->to($user->email, $user->username)->subject('Activate your account');
				});

				// after send
				return Redirect::route('home') // redirect to home 
					// with feedback to user about his account and email
					->with('global', 'Your account has been created. We send an email to active your account.');
			} 
		}
	}
//-- END OF CREATE ACCOUNT--\\


//-- START OF ACTIVATION ACCOUNT--\\

	public function getActivate($code) { 
		// get the current user's code when not active yet
		$user = User::where('code', '=', $code)->where('active', '=', 0);

 		// checks if $user is available based on where clause
		if ($user->count()){ 
			$user = $user->first(); // the first record based on results of where clause
			
			//update user to active state
			$user->active 	= 1; // set active to 1
			$user->code 	= ''; // remove unique code (save space on db)
			
			if ($user->save()) { // saves the updated information to the specific user
				return Redirect::route('home') // if save passes, redirects to home
					->with('global', 'Activated! you can now sign in.'); // passes feedback to the user about the succes
			}	
		}
		// fallback if non of the previous checks pas
		return Redirect::route('home') // redirect to home page
			->with('global', 'We could not activate your account, try again later'); // passes feedback to the user about what heppaned
	}

	//-- END OF ACTIVATION ACCOUNT--\\

	//-- START OF FORGOT PASSWORD--\\

	public function getForgotPassword() {	
		return View::make('account.forgot');
	}

	public function postForgotPassword() {	
		$validator = Validator::make(Input::all(), array (
				'email'	=> 'required|email'

			));
		if($validator -> fails()) {
			return Redirect::route('account-forgot-password')
					->withErrors($validator)
					->withInput();
		} else {
			
			$user = User::where('email', '=', Input::get('email'));

			if($user->count()) {
				$user = $user->first();

				//generate a new code and password
				$code 					= str_random(60);
				$password 				= str_random(10);

				$user->code 			= $code;
				$user->password_temp 	= Hash::make($password);

				if($user->save()) {
					
					Mail::send('emails.auth.forgot', array('link' => URL::route('account-recover', $code), 'username'=> $user->username, 'password' => $password), function($message) use($user) {
						$message -> to($user->email, $user->username)->subject('your new password');
					});

					return Redirect::route('home')
							->with('global', 'we have send you a new password by email');
				}
			}
		}
		return Redirect::route('account-forgot-password')
				->with('global', 'could not request new password');
	} 

	public function getRecover($code) {
		$user = User::where('code', '=', $code)
				->where('password_temp', '!=', '');

				if ($user->count()) {
					$user = $user->first();

					$user->password 		= $user->password_temp;
					$user->password_temp 	= '';
					$user->code 			= '';

					if($user->save()) {
						return Redirect::route('home') 
						->with('global', 'your account had been recovered and you can sign in with your new password')
					}
				}
				return Redirect::route('home') 
						->with('global', 'Could not recover your account')
	}

	//-- END OF FORGOT PASSWORD--\\
}












?>