@extends('layout.main')

@section('content')
	<form action="{{ URL::route('account-sign-in-post') }}" method="post">
		
		<div id="field">
			Email: <input type="text" name="email" {{ (Input::old('email')) ? ' value="'. Input::old('email') .' " ' : '' }}>
			@if($errors->has('email'))
				{{ $errors->first('email') }}
			@endif
		</div>

		<div id="field">
			Password: <input type="password" name="password">
			@if($errors->has('password'))
				{{ $errors->first('password') }}
			@endif
		</div>
		<div class="field">
			<input type="checkbox" name="remember" id="remember">
			<label for="remember">remember me</label>
		</div>

		<input type="submit" value="signin">

		{{ Form::token() }}

	</form>
@stop