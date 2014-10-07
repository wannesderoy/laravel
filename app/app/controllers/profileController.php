image<?php 

class ProfileController extends BaseController

{
   /**
	* Start of user profile controller
	*/
	public function user($username) { 
		$user = User::where('username', '=', $username); // get the user where username(from url) is the same

		if ($user->count()) { // count all the user that are found
			$user = $user->first(); // get the first user 

			return View::make('profile.user') // return the view of the user profile
					->with('user', $user); // with the variable of that user
		}
		return App::abort(404); // when no ons is found: returns a 404 not found by laravel
	}
}
?>