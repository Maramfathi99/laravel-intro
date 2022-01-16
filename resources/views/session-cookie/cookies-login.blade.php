@extends("layouts.mylayout")
@section("title","Cookies Login Page")
@section("content")

<form method='post' action='{{route("cookies-post-login")}}'>
    @csrf
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="email">Email Address</label>
            <input autofocus='true' value='{{ old("email") }}' type="text" class="form-control" name="email" id="email" placeholder="Enter Email Address">
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
            
        </div>
    </div>    
    <button class="btn btn-primary" type="submit">Login</button>
</form>
@endsection