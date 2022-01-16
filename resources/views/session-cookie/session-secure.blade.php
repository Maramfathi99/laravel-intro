@extends("layouts.mylayout")
@section("title","Session Secure Page")
@section("content")


<div class='alert alert-warning mb-2'>Welcome to Session Secure Page</div>

<a class='btn btn-danger' href='{{asset("session/signout")}}'>Sign Out</a>
@endsection