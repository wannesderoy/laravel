@extends('layout.main')

@section('content')

	{{ Form::open(array('action' => 'accountController@postEditInfo', 'files' => true)) }}
		
		{{ Form::label('firstname', 'Firstname') }}
		{{ Form::text('firstname','', array('class' => 'field', 'placeholder'=>'John')); }}
		@if($errors->has('firstname'))
				{{ $errors->first('firstname') }}
		@endif
		{{ Form::label('lastname', 'Lastname') }}
		{{ Form::text('lastname','', array('class' => 'field', 'placeholder'=>'Doe')); }}
		@if($errors->has('lastname'))
				{{ $errors->first('lastname') }}
		@endif
		{{ Form::label('email', 'Email') }}
		{{ Form::email('email','', array('class' => 'field', 'placeholder'=>'john@doe.com')); }}
		@if($errors->has('email'))
				{{ $errors->first('email') }}
		@endif
		{{ Form::label('profilepicture', 'profile picture') }}
		{{ Form::file('profilepicture','', array('class' => 'field')); }}
		@if($errors->has('profilepicture'))
				{{ $errors->first('profilepicture') }}
		@endif
		{{ Form::label('phonenumber', 'Phone number') }}
		{{ Form::text('phonenumber','', array('class' => 'field')); }}
		@if($errors->has('phonenumber'))
				{{ $errors->first('phonenumber') }}
		@endif
		{{ Form::label('website', 'Website') }}
		{{ Form::text('website','', array('class' => 'field', 'placeholder'=>'http://')); }}
		@if($errors->has('website'))
				{{ $errors->first('website') }}
		@endif
		{{ Form::label('twitter', 'Twitter handle') }}
		{{ Form::text('twitter','', array('class' => 'field', 'placeholder'=>'@')); }}
		@if($errors->has('twitter'))
				{{ $errors->first('twitter') }}
		@endif
		{{ Form::label('size', 'Size') }}
		{{ Form::select('size', array('-' => '-', 'L' => 'Large', 'S' => 'Small'), '-'); }}
		@if($errors->has('size'))
				{{ $errors->first('size') }}
		@endif
		{{ Form::token(); }}

		{{ Form::submit('Click Me!'); }}

    {{ Form::close() }}

@stop