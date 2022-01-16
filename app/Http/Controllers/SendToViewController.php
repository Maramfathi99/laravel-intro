<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendToViewController extends Controller
{
    function index(){
        return view("send-to-view.index");
    }
    function usingWith(){
        $colors = ['red','yellow','green'];
        $usersCount = 2000;        
        return view("send-to-view.with")
            ->with("colors",$colors)
            ->with("usersCount",$usersCount);
    }
    function usingWithName(){
        $colors = ['red','yellow','green'];
        $usersCount = 2000;        
        return view("send-to-view.with-name")
            ->withUsersCount($usersCount)
            ->withColors($colors);
    }
    function usingCompact(){
        $colors = ['red','yellow','green'];
        $usersCount = 2000;       
        return view("send-to-view.compact",compact('colors','usersCount'));
    }
}