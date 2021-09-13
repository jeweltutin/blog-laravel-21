<?php

namespace App\Http\Controllers;

use App\Http\Controllers\FrontendController;
use Illuminate\Http\Request;

use App\Models\Post;

class FrontendController extends Controller
{
    public function home(){
        $posts = Post::orderBy('created_at', 'DESC')->take(5)->get();
        //$recentPosts = Post::orderBy('created_at', 'DESC')->paginate(9);
        $recentPosts = Post::with('category','user')->orderBy('created_at', 'DESC')->paginate(9);
        return view('website.home', compact('posts', 'recentPosts'));
    }

    public function about(){
        return view('website.about');
    }

    public function category(){
        return view('website.category');
    }

    public function contact(){
        return view('website.contact');
    }

    public function post($slug){
        $post = Post::with('category', 'user')->where('slug', $slug ) ->first();
        //dd($post);
        if($post){
            return view('website.post', compact('post'));
        }else{
            return redirect('/');
        }
        
    }
}
