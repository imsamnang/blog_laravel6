<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
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
			$categories = Category::all();
      return view('posts.create')->withCategories($categories);
    }

    public function store(Request $request)
    {
			$this->validate($request,[
				'title' => 'required|max:100',
				'body'	=> 'required',
				'category_id' => 'required|integer'
				// 'slug'	=> 'required|alpha_dash|min:5|max:100|unique:posts,slug'
				]);
				$form_data = array(
					'title' => $request->title,
					'body' 	=> $request->body,
					'category_id' 	=> $request->category_id,
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
			$categories = Category::all();
			$cats = array();
			foreach ($categories as $cat) {
				$cats[$cat->id] = $cat->name;
			}
			return view('posts.edit')->withPost($post)->withCategories($cats);
    }

    public function update(Request $request, $id)
    {
			//validate data
			$post = Post::findOrFail($id);
			// if($request->slug == $post->slug){
			// 	$this->validate($request,[
			// 		'title' 	=> 'required|max:100',
			// 		'body'		=> 'required',
			// 		'category_id' => 'required'
			// 	]);					
			// } else {
				$this->validate($request,[
					'title' => 'required|max:100',
					'body'	=> 'required',
					'category_id' => 'required'
					// 'slug'	=> 'required|alpha_dash|min:5|max:100|unique:posts,slug',
				]);	
			// }
			//Save data to database
			$post->title = $request->title;
			$post->body = $request->body;
			$post->category_id = $request->category_id;
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
