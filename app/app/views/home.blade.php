@extends('layout.main')

@section('content')
	@if(Auth::check())
		<p>hello {{ Auth::user()->username }} </p>
		<p>Your e-mail {{ Auth::user()->email }} </p>
		
	@else
	
	@endif
@stop