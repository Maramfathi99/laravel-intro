<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;


class SessionCookieController extends Controller
{
    function sessionLogin(){
        return view("session-cookie.session-login");
    }    
    function sessionPostLogin(Request $request){
        if($request->email=='aa@aa.com' && $request->password=='aa'){
            //تخزين البريد الالكتروني في السيشن
            session()->put("email",$request->email);
            return redirect('session/secure');
        }
        else{
            session()->flash("msg","e: Invalid Email or Password");
            return redirect('session/login');
        }
    }
    function sessionSecurePage(){
        //ما في معلومة ايميل في السيشن
        if(!session()->get('email'))
            //الله يساهل عليه
            return redirect('session/login');
        //اهلا وسهلا
        return view("session-cookie.session-secure");
    }
    function sessionSignout(){
        session()->forget('email');
        return redirect('session/login');
    }
    /******* Cookies Example **************/

    function cookiesLogin(){
        return view("session-cookie.cookies-login");
    }    
    function cookiesPostLogin(Request $request){
        if($request->email=='aa@aa.com' && $request->password=='aa'){
            //تخزين كوكي مشفرة لمدة 14 يوم
            Cookie::queue('email', $request->email,60*24*14);
            return redirect('cookies/secure');
        }
        else{
            session()->flash("msg","e: Invalid Email or Password");
            return redirect('cookies/login');
        }
    }
    function cookiesSecurePage(){
        //ما في معلومة ايميل في الكوكيز
        if(!request()->cookie('email'))
            //الله يساهل عليه
            return redirect('cookies/login');
        //اهلا وسهلا
        return view("session-cookie.cookies-secure");
    }
    function cookiesSignout(){
        //delete cookies
        Cookie::queue(Cookie::forget('email'));
        return redirect('cookies/login');
    }
}
