<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function home(){
        return view("blog.home");
    }
    public function program(){
        return view("blog.program");
    }
    public function mentor(){
        return view("blog.mentor");
    }
    public function beasiswa(){
        return view("blog.beasiswa");
    }
    public function login(){
        return view("blog.login");
    }
    public function register(){
        return view("blog.register");
    }
}
