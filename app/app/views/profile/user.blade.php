@extends('layout.main')

@section('content')
<h2>User profile of {{ e($user->fullname) }}</h2>
<h4>AKA: {{ e($user->username) }}</h4>
<div>
	<h5>Contact</h5>
<p>email: <a href="mailto:{{ e($user->email) }}">{{ e($user->email) }}</a></p>
<p>phone: {{ e($user->phonenumber) }}</p>
<p>twitter: <a href="http://twitter.com/{{ e($user->twitter) }}">{{e($user->twitter) }}</a></p>
<p>website: <a href="{{ e($user->website) }}">{{ e($user->website)}}</a></p>
<img src="../{{ e($user->profile_picture) }}" height="200" width="200"/>
</div>
@stop