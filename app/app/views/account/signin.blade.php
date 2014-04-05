@extends('layout.main')

@section('content')
	<form action="{{ URL::route('account-sign-in-post') }}" method="post">
		
		<div id="field">
			Username: <input type="text" name="username" {{ (Input::old('username')) ? ' value="'. Input::old('username') .' " ' : '' }}>
			@if($errors->has('username'))
				{{ $errors->first('username') }}
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