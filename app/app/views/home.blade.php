@extends('layout.main')

@section('content')
	@if(Auth::check())
		<p>hello {{ Auth::user()->fullname }} </p>
		<p>Your e-mail {{ Auth::user()->email }} </p>
		<p>Your profile picture: </p>
		<!-- change model to print out complete picture with tag and everything -->
		{{ User::set_profile_picture(); }}
		<!-- //\\ -->
	@else
	
	@endif
@stop