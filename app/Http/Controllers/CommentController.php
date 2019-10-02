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
		$comment = Comment::findOrFail($id);
		return view('comments.edit')->withComment($comment);
	}

	public function update(Request $request, $id)
	{
		$comment = Comment::findOrFail($id);
		$this->validate($request,[
			'comment' => 'required'
		]);
		$comment->comment = $request->comment;
		$comment->save();
		return redirect()->route('posts.show',$comment->post->id)->with('success','Comment has been updated');

	}

	public function delete($id)
	{
		$comment = Comment::findOrFail($id);
		return view('comments.delete')->withComment($comment);
		
	}
	public function destroy($id)
	{
		$comment = Comment::findOrFail($id);
		$post_id = $comment->post->id;
		$comment->delete();
		return redirect()->route('posts.show',$post_id)->with('success','Comment has been deleted');
	}

}
