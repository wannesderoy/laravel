<?php

class HomeController extends BaseController {
	public function home() {





		//MAIL TEST
		//Mail::send('emails.auth.test',array('name'=>'wannes'), function($message) {
		//	$message->to('wannesderoy@gmail.com', 'wannes de roy')->subject('test email');
		//});
		
		////test to see if db connection is made en information is accesible		
		//Only print username from db to home view
		//echo $user = User::find(1)->username;
		//print in home all the data from db to home view
		//echo '<pre>', print_r($user), '</pre>';	
		

		return View::make('home');
	}
}