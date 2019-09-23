<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
			$posts = Post::orderBy('created_at','desc')->paginate(5);
			return view('posts.index',compact('posts'));
    }

    public function create()
    {
      return view('posts.create');
    }

    public function store(Request $request)
    {
      $this->validate($request,[
				'title' => 'required|max:100',
				'body'	=> 'required'
			]);	
			$form_data = array(
				'title' => $request->title,
				'body' 	=> $request->body,
				'slug'	=> strtolower($this->make_slug($request->title))
			);
			$post = Post::create($form_data);
			return redirect()->route('posts.show',$post->id)->with('success','The blog post was successfully save!');
    }

    public function show($id)
    {
			$post = Post::findOrFail($id);
			return view('posts.show',compact('post'));
    }

    public function edit($id)
    {
			$post = Post::findOrFail($id);
			return view('posts.edit',compact('post'));
    }

    public function update(Request $request, $id)
    {
			//validate data
			 $this->validate($request,[
				'title' => 'required|max:100',
				'body'	=> 'required'
			]);	
			//Save data to database
			$post = Post::findOrFail($id);
			$post->title = $request->title;
			$post->body = $request->body;
			$post->slug = strtolower($this->make_slug($request->title));
			$post->save();
			// redirect with flash data
			return redirect()->route('posts.show',$post->id)->with('success','Data was updated succesfully');
    }

    public function destroy($id)
    {
			$post = Post::findOrFail($id);
			$post->delete();
			return redirect()->route('posts.index')->with('success','Data was deleted succesfully');
    }
}
