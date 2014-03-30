<nav>
	<ul>
		<li><a href="{{ URL::route('home') }}">Home</a></li>
		@if(Auth::check())
			you are signed in (navigation.blade.php)
		@else
			<li><a href="{{ URL::route('account-sign-in') }}">Sign In</a></li>
			<li><a href="{{ URL::route('account-create') }}">Create Account</a></li>
		@endif
	</ul>
</nav>