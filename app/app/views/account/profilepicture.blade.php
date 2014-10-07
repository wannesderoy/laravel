@extends('layout.main')

@section('content')

	{{ Form::open(array('action' => 'accountController@postProfilePicture', 'files' => true)) }}

		{{ Form::label('profilepicture', 'profile picture') }}
		{{ Form::file('profilepicture','', array('class' => 'field')); }}
		@if($errors->has('profilepicture'))
				{{ $errors->first('profilepicture') }}
		@endif

	{{ Form::submit('Save'); }}

    {{ Form::close() }}

@stop