@extends('layout.main')

@section('content')
	@if(Auth::check())
		<p>hello {{ Auth::user()->username }} </p>
	@else
	<p>you are not signed in (home.blade.php)</p>
	@endif
@stop