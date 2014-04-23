@extends('layout.main')

@section('content')

	<form action="{{URL::route('account-editinfo')}}" method="post">
		
		<div id="field">
			First name: <input type="text" name="firstname" {{ (Input::old('firstname')) ? ' value ="'. e(Input::old('firstname')).'"' : '' }}>
			@if($errors->has('firstname'))
				{{ $errors->first('firstname') }}
			@endif
		</div>

		<div id="field">
			Last name: <input type="text" name="lastname" {{ (Input::old('lastname')) ? ' value ="'. e(Input::old('lastname')).'"' : '' }}>
			@if($errors->has('lastname'))
				{{ $errors->first('lastname') }}
			@endif
		</div>

		<div id="field">
			<label for="profilepicture">Profile picture:</label>
			<input type="file" name="profilepicture" {{ (Input::old('profilepicture')) ? ' value ="'. e(Input::old('profilepicture')).'"' : '' }}>
			<label for="picturename">picture name</label>
			<input type="text" name="picturename" value="my portrait"></input>
			@if($errors->has('profilepicture'))
				{{ $errors->first('profilepicture') }}
			@endif
		</div>

		<div id="field">
			Phone Number: <input type="text" name="phonenumber" {{ (Input::old('phonenumber')) ? ' value ="'. e(Input::old('phonenumber')).'"' : '' }}>
			@if($errors->has('phonenumber'))
				{{ $errors->first('phonenumber') }}
			@endif
		</div>
		<div id="field">
			Website: <input type="text" name="website" {{ (Input::old('website')) ? ' value ="'. e(Input::old('website')).'"' : '' }}>
			@if($errors->has('website'))
				{{ $errors->first('website') }}
			@endif
		</div>

		<div id="field">
			Twitter Handle: <input type="text" name="twitter" {{ (Input::old('twitter')) ? ' value ="'. e(Input::old('twitter')).'"' : '' }}>
			@if($errors->has('twitter'))
				{{ $errors->first('twitter') }}
			@endif
		</div>
		<div id="field">
		
	</div>
		<input type="submit" value='Edit account'>
		{{Form::token() }}
	</form>
@stop