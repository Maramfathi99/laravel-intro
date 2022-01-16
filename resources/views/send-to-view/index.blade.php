@extends("layouts.mylayout")
@section("title","Send To View Data")
@section("content")


<ul>
    <li><a href='{{asset("send-to-view/with")}}'>Using With</a></li>
    <li><a href='{{asset("send-to-view/with-name")}}'>Using With Name</a></li>
    <li><a href='{{asset("send-to-view/compact")}}'>Using Compact</a></li>
</ul>
@endsection