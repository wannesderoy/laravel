@extends('layout.main')

@section('content')

	<form action="" method="POST">
		<div>
			Old Password:<input type="password" name="old_password">
			@if($errors->has('old_password'))
				{{ $errors->first('old_password') }}
			@endif
		</div>
		<div>
			Password: <input type="password" name="password">
			@if($errors->has('password'))
				{{ $errors->first('password') }}
			@endif
		</div>
		<div>
			Password repeat: <input type="password" name="passwordrepeat">
			@if($errors->has('passwordrepeat'))
				{{ $errors->first('passwordrepeat') }}
			@endif
		</div>
		<div>
			<input type="submit" value='Change password'>
		</div>
		{{ Form::token() }}
	</form>
@stop