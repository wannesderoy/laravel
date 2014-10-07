@extends('layout.main')

@section('content')
	@if(Auth::check())
		<p>hello {{ Auth::user()->fullname }} </p>
		<p>Your e-mail: {{ Auth::user()->email }} </p>
		
		@if( Auth::user()->profile_picture )
		<p>Your profile picture: </p>
		<img src="{{ Auth::user()->profile_picture }}" height="200" width="200"/>
		@endif
	@else
	
	@endif
@stop