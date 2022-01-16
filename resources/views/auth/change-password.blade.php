@extends("layouts.mylayout")
@section("title","Change Password")
@section("content")
<form method='post' action='{{route("post-change-password")}}'>
    @csrf
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="current_password">Current Password</label>
            <input autofocus='true' type="password" class="form-control" name="current_password" id="current_password" placeholder="Enter Your Current Password">
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="new_password">New Password</label>
            <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Enter New Password">
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="new_password_confirmation">New Password Confirmation</label>
            <input type="password" class="form-control" name="new_password_confirmation" id="new_password_confirmation" placeholder="Enter New Password Confirmation">
            
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Change Password</button>

</form>
@endsection