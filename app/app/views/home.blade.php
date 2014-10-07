@extends('layout.main')

@section('content')
	@if(Auth::check())
		<p>hello {{ Auth::user()->fullname }} </p>
		<p>Your e-mail: {{ Auth::user()->email }} </p>
		
		@if( Auth::user()->profile_picture )
		<p>Your profile picture: </p>
<<<<<<< HEAD
		<img src="{{ Auth::user()->profile_picture }}" height="200" width="200"/>
		@endif
=======
		<!-- change model to print out complete picture with tag and everything -->
		{{ User::set_profile_picture(); }}
		<!-- //\\ -->
>>>>>>> development
	@else
	
	@endif
@stop