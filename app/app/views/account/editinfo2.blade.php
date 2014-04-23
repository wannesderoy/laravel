@extends('layout.main')

@section('content')

	{{ Form::open('login') }}

		<p>{{ Form::label(‘username’, ‘Username’) }}</p>
		<p>{{ Form::text(‘username’) }}</p>

    {{ Form::close() }}

@stop