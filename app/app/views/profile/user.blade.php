@extends('layout.main')

@section('content')
<p>User profile of {{ $user->username}} ({{ $user->email }})</p>

@stop