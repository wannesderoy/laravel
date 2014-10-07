<nav>
	<ul>
		<li><a href="{{ URL::route('home') }}">Home</a></li>
		@if(Auth::check())
			<li><a href="{{ URL::route('account-sign-out') }}">Sign Out</a></li>
			<li><a href="{{ URL::route('account-changepassword') }}">Change password</a></li>
			<li><a href="{{ URL::route('account-editinfo') }}">Edit</a></li>
			<li><a href="{{ URL::route('account-profile-picture') }}">Add profile picture</a></li>
			<li><a href="{{ route('profile-user', Auth::user()->username); }}">Own account</a></li>
		@else
			<li><a href="{{ URL::route('account-sign-in') }}">Sign In</a></li>
			<li><a href="{{ URL::route('account-create') }}">Create Account</a></li>
		@endif
	</ul>
</nav>