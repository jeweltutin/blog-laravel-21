<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(){
        $posts = Post::orderBy('created_at', 'DESC')->take(7)->get();
        $postCount = Post::all()->count();
        $categoryCount = Category::all()->count();
        $tagCount = Tag::all()->count();
        $userCount = User::all()->count();
        return view('admin.dashboard.index', compact(['posts','postCount','categoryCount','tagCount','userCount']));
    }
}
