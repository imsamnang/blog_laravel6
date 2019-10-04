<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

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
		$tags = Tag::all();
		return view('posts.create')->withCategories($categories)->withTags($tags);
	}

	public function store(Request $request)
	{
		$this->validate($request,[
			'title' => 'required|max:100',
			'body'	=> 'required',
			'category_id' => 'required|integer',
			'featured_image' => 'required|image'
			// 'slug'	=> 'required|alpha_dash|min:5|max:100|unique:posts,slug'
			]);
			if($request->hasFile('featured_image')){
				$image = $request->file('featured_image');
				$filename = time().'.'.$image->getClientOriginalExtension();
				$location = public_path('/uploads/images/'.$filename);
				Image::make($image)->resize(800,400)->save($location);
			}
			$form_data = array(
				'title' => $request->title,
				'body' 	=> Purifier::clean($request->body),
				'category_id' 	=> $request->category_id,
				'slug'	=> strtolower($this->make_slug($request->title)),
				'image' => $filename
		);
		$post = Post::create($form_data);
		// $post->tags()->sync($request->tags,false);
		$post->tags()->attach($request->tags);
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
		$tags = Tag::pluck('name','id')->toArray();
		$cats = array();
		foreach ($categories as $cat) {
			$cats[$cat->id] = $cat->name;
		}
		// $tags = Tag::all();
		// $tags2 = array();
		// foreach ($tags as $tag ) {
		// 	$tags2[$tag->id] = $tag->name;
		// }
		return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags);
	}

	public function update(Request $request, $id)
	{
		//validate data
		$post = Post::findOrFail($id);
		$oldimage = $post->image;
		$this->validate($request,[
			'title' => 'required|max:100',
			'body'	=> 'required',
			'category_id' => 'required'
		]);	
		if($request->hasFile('featured_image')){
			$image = $request->file('featured_image');
			File::delete(public_path('uploads/images/'.$oldimage));
			$filename = time().'.'.$image->getClientOriginalExtension();
			$location = public_path('/uploads/images/'.$filename);
			Image::make($image)->resize(800,400)->save($location);
		} else {
			$filename= $oldimage;
		}
		//Save data to database
		$post->title = $request->title;
		$post->body = Purifier::clean($request->body);
		$post->category_id = $request->category_id;
		$post->slug = strtolower($this->make_slug($request->title));
		$post->image = $filename;
		$post->save();
		
		if (isset($request->tags)) {
			$post->tags()->sync($request->tags);
		} else {
			$post->tags()->sync(array());
		}
		// redirect with flash data
		return redirect()->route('posts.show',$post->id)->with('success','Data was updated succesfully');
	}

	public function destroy($id)
	{
		$post = Post::findOrFail($id);
		File::delete(public_path('uploads/images/'.$post->image));
		$post->tags()->detach();
		$post->delete();
		return redirect()->route('posts.index')->with('success','Data was deleted succesfully');
	}
}
