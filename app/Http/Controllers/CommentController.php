<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
	public function index()
	{
			//
	}

	public function create()
	{
			//
	}

	public function store(Request $request, $post_id)
	{
		$this->validate($request,[
			'name' => 'required|max:255',
			'email' => 'required|email|max:255',
			'comment' => 'required|min:5|max:2000'
		]);
		$post = Post::findOrFail($post_id);
		$comment = new Comment();
		$comment->name = $request->name;
		$comment->email = $request->email;
		$comment->comment = $request->comment;
		$comment->approved = true;
		$comment->post()->associate($post);
		$comment->save();
		return redirect()->route('blog.single',$post->slug)->with('success','Comment Successfully Added');
	}

	public function show($id)
	{
			//
	}

	public function edit($id)
	{
			//
	}

	public function update(Request $request, $id)
	{
			//
	}

	public function destroy($id)
	{
			//
	}

}
