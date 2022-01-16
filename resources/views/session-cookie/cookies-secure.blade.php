@extends("layouts.mylayout")
@section("title","Cookies Secure Page")
@section("content")


<div class='alert alert-warning mb-2'>Welcome to Cookies Secure Page</div>

<a class='btn btn-danger' href='{{asset("cookies/signout")}}'>Sign Out</a>
@endsection