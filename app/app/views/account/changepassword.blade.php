@extends('layout.main')

@section('content')

	<form action="" method="POST">
		<div>
			Email:<input type="email" name="email">
		</div>
		<div>
			Password: <input type="password" name="password">
		</div>
		<div>
			Password repeat: <input type="password" name="passwordrepeat">
		</div>
	</form>
@stop