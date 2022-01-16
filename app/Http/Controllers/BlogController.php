<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    function index(){
        return view("blog.index");
    }
      function about(){
        return view("blog.about");
    }
    
    function products($id){
        return view("blog.products");
    }
    
    function store(){
        return view("blog.store");
    }
    
   
}
