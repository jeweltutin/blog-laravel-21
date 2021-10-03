<?php

namespace App\Http\Controllers;

use App\Http\Controllers\FrontendController;
use Illuminate\Http\Request;

use Session;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use App\Models\Contact;

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
        $user = User::first();
        return view('website.about', compact('user'));
    }

    public function category($slug){
        $category= Category::where('slug',$slug)->first();
        if($category){
            $posts = Post::where('category_id', $category->id)->paginate(9);
            //dd($posts);
            return view('website.category', compact(['category','posts']));
        }else{
            return redirect()->route('website');
        }
        
    }

    public function tag($slug){
        $tag= Tag::where('slug',$slug)->first();
        if($tag){
            $posts = $tag->posts()->orderBy('created_at', 'desc')->paginate(9);
            //return $posts;
            //dd($posts);
            return view('website.tag', compact(['tag','posts']));
        }else{
            return redirect()->route('website');
        }
        
    }

    public function contact(){
        return view('website.contact');
    }

    public function post($slug){
        //$post = Post::with('category', 'user')->where('slug', $slug ) ->first();
        $post = Post::where('slug', $slug )->first();
        $popular_posts = Post::with('category','user')->inRandomOrder()->limit(4)->get();
        //dd($post);

        $relatedPosts = Post::orderBy('category_id', 'desc')->inRandomOrder()->take(4)->get();
        $firstRelatedPost = $relatedPosts->splice(0, 1);
        $firstRelatedPost2 = $relatedPosts->splice(0, 2);
        $lastRelatedPost = $relatedPosts->splice(0, 1);

        $categories = Category::all();
        $tags = Tag::all();

        if($post){
            return view('website.post', compact(['post','popular_posts','categories','tags','firstRelatedPost','firstRelatedPost2','lastRelatedPost']));
        }else{
            return redirect('/');
        }
        
    }

    public function send_message(Request $request){
        //dd($request->all());

        $this->validate($request, [
            'name' => 'required|max:200',
            'email' => 'required|email|max:200',
            'subject' => 'required|max:255',
            'message' => 'required|min:100'
        ]);

        $contactMsg = Contact::create($request->all());

        Session::flash('message-send', 'Contact message send Successfully');
        return redirect()->back();


    }


}
