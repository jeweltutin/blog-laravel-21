<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\str;
use Carbon\Carbon;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::orderBy('created_at', 'DESC')->paginate(20);
        $posts = Post::all();
        return view('admin.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.post.create', compact(['categories','tags']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'title' => 'required|unique:posts,title',
            'image' => 'required|image',
            'description' => 'required',
            'categoryid' => 'required'
        ]);

        //dd($request->all());

        $post = Post::create([
            'title' => $request->title,
            'slug' => Str::of($request->title)->slug('-'),
            'image' => 'image.jpg',
            'description' => $request->description,
            'category_id' => $request->categoryid,
            'user_id' => auth()->user()->id,
            'published' => Carbon::now() 
        ]);

        $post->tags()->attach($request->tags);

        if($request->hasFile('image')){
            $upimage = $request->image;
            //$imageNewName = time().'.'. $upimage->getClientOriginalName();
            $imageNewName = time().'.'. $upimage->getClientOriginalExtension();
            //return $imageNewName;
            $upimage->move('storage/post', $imageNewName);
            $post->image = '/storage/post/'. $imageNewName;         
        }

        $post->save();
        
        Session::flash('success', 'Post created successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.post.edit', compact(['post', 'categories', 'tags']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //dd($request->all());

        $this->validate($request, [
            'title' => "required|unique:posts,title, $post->id",
            //'title' => 'required',
            //'image' => 'sometimes|image',
            'description' => 'required',
            'categoryid' => 'required'
        ]);

        //dd($request->all());

        $post->title = $request->title;
        $post->slug = Str::of($request->title)->slug('-');
        //$post->image = 'iamge.jpg';
        $post->description = $request->description;
        $post->category_id = $request->categoryid;

        $post->tags()->sync($request->tags);

        //if($request->has('image')){
        //if ($request->hasFile('image')){
        if ($request->hasFile('image')){
            $upimage = $request->image;
            $imageNewName = time().'.'. $upimage->getClientOriginalExtension();
            $upimage->move('storage/post', $imageNewName);
            $post->image = '/storage/post/'. $imageNewName;            
        }
        else{
            //dd($request->all());
        }
        $post->save();

        Session::flash('success', 'Post updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post){
            if(file_exists(public_path($post->image))){
                //dd('Found');
                unlink(public_path($post->image));
            }
            /*else{
                dd('Not Found');
            }*/

            $post->delete();
            Session::flash('Post deleted successfully');
        }

        return redirect()->back();
    }

    /**
     * Own function for on off button
     */

     public function featuredbtn(Post $post)
     {
         return $post;
     }
}
