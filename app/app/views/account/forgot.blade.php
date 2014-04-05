@extends('layout.main')

@section('content')
	<p>forgot password</p>

	<form method="post" action="{{ URL::route('account-forgot-password-post') }}">

		<div>
			Email: <input name="email" type="email" {{ (Input::old('email')) ? ' value="'. e(Input::old('email')) .' " ' : '' }} >
			@if($errors->has('email'))
				{{ $errors->first('email') }}
			@endif
		</div>

		<div>
			<input name="submit" type="submit" value="Recover">
		</div>
		{{ Form::token() }}
		
	</form>
@stop