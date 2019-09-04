<div id="impersonation-bar">
	<div class="container">
		<p>You are currently impersonating {{ Auth::user()->email }}</p>
		<a href="{{ route('impersonate.leave') }}"><span class="mr-3" uk-icon="sign-out"></span> Leave impersonation</a>
	</div>
</div>