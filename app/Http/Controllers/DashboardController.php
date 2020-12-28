<?php

namespace App\Http\Controllers;
use App\Posts;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $posts = Posts::orderBy('created_at', 'desc')->paginate(5);
        return view('home', compact('posts'));
    }

    public function news($slug){
        $post = Posts::where('slug', '=', $slug)->firstOrFail();
        return view('news', compact('post'));
    }
    public function dashboard(){
        return view('dashboard');
    }
    public function berita(){
        $posts = Posts::orderBy('created_at', 'desc')->paginate(5);
        return view('berita', compact('posts'));
    }
    public function lihat($slug){
        // return view('lihat');
        $post = Posts::where('slug', '=', $slug)->firstOrFail();
        return view('lihat', compact('post'));
    }
    
}
