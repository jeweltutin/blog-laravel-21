<?php

namespace App\Http\Controllers;

use App\Http\Controllers\FrontendController;
use Illuminate\Http\Request;

use App\Models\Post;

class FrontendController extends Controller
{
    public function home(){
        $posts = Post::with('category', 'user')->orderBy('created_at', 'DESC')->take(5)->get();

        $firstTwo = $posts->splice(0, 2);
        $middleOne = $posts->splice(0, 1);
        $lastTwo = $posts->splice(0);

        //return $lastTwo;
        //$recentPosts = Post::orderBy('created_at', 'DESC')->paginate(9);

        $LastSectionPosts = Post::with('category', 'user')->inRandomOrder()->limit(4)->get();

        $lFirstOne = $LastSectionPosts->splice(0, 1);
        $lMiddleTwo = $LastSectionPosts->splice(0, 2);
        $lLastOne = $LastSectionPosts->splice(0);

        //return $lLastOne;

        $recentPosts = Post::with('category','user')->orderBy('created_at', 'DESC')->paginate(9);
        return view('website.home', compact('posts', 'recentPosts', 'firstTwo', 'middleOne', 'lastTwo', 'lFirstOne', 'lMiddleTwo', 'lLastOne' ));
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
        //$post = Post::with('category', 'user')->where('slug', $slug ) ->first();
        $post = Post::where('slug', $slug )->first();
        //dd($post);
        if($post){
            return view('website.post', compact('post'));
        }else{
            return redirect('/');
        }
        
    }
}
