@extends('layout.main')

@section('content')
	@if(Auth::check())
		<p>hello {{ Auth::user()->username }} </p>
	@else
	
	@endif
@stop