@extends('layout.main')

@section('content')
	@if(Auth::check())
		<p>hello {{ Auth::user()->username }} </p>
		<p>Your e-mail {{ Auth::user()->email }} </p>
		<p>Your profile picture: </p>
		<img src="{{ Auth::user()->profile_picture }}" width="2OO"/>
	@else
	
	@endif
@stop