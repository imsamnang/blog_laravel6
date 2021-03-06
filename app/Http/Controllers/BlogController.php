<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
	public function index()
	{
		$posts = Post::paginate(5);
		return view('blog.index')->withPosts($posts);	
	}

  public function singlePost($slug)
	{
		$post = Post::where('slug','=',$slug)->first();
		return view('blog.single')->withPost($post);
	}

}
