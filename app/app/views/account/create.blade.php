@extends('layout.main')

@section('content')

	<form action="{{URL::route('account-create-post')}}" method="post">
		
		<div id="field">
			email: <input type="text" name="email" {{ (Input::old('email')) ? ' value ="'. e(Input::old('email')).'"' : '' }}>
			@if($errors->has('email'))
				{{ $errors->first('email') }}
			@endif
		</div>

		<div id="field">
			username: <input type="text" name="username" {{ (Input::old('username')) ? ' value ="'. e(Input::old('username')).'"' : '' }}>
			@if($errors->has('username'))
				{{ $errors->first('username') }}
			@endif
		</div>

		<div id="field">
			password: <input type="password" name="password">
			@if($errors->has('password'))
				{{ $errors->first('password') }}
			@endif
		</div>
		<div id="field">
			repeat password: <input type="password" name="password_again">
			@if($errors->has('password_again'))
				{{ $errors->first('password_again') }}
			@endif
		</div>

		<input type="submit" value='Create account'>
		{{Form::token() }}
	</form>
@stop