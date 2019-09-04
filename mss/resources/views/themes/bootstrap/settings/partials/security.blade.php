<form action="{{ route('wave.settings.security.put') }}" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label class="uk-form-label">Current Password</label>
        <input class="form-control" name="current_password" type="password" placeholder="Current Password">
    </div>
    <div  class="form-group">
        <label class="uk-form-label">New Password</label>
        <input class="form-control" name="password" type="password" placeholder="New Password">
    </div>
    <div  class="form-group">
        <label class="uk-form-label">Confirm New Password</label>
        <input class="form-control" name="password_confirmation" type="password" placeholder="Confirm New Password">
    </div>
    <input type="hidden" name="_method" value="PUT">
    {{ csrf_field() }}
    <div class="form-group text-right">
    	<button class="btn btn-primary" type="submit">Update</button>
    </div>
</form>