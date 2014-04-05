@extends('layout.main')

@section('content')
<p>User profile of {{ e($user->username) }} ({{ e($user->email) }})</p>

@stop