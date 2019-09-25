<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

		public function _construct()
		{
			$this->middleware('auth');
		}

    public function index()
    {
			$tags = Tag::all();
			return view('tags.index')->withTags($tags);
    }

    public function create()
    {
      return view('tags.create');
    }

    public function store(Request $request)
    {
      $this->validate($request,[
				'name' => 'required|max:100'
			]);
			$tag= Tag::create([
				'name' => $request->name
			]);
			return redirect()->route('tags.index')->with('success','New Tag has been Created');
		}

    public function show($id)
    {
			$tag = Tag::findOrFail($id);
			return view('tags.show')->withTag($tag);
    }

    public function edit($id)
    {
      $tag = Tag::findOrFail($id);
      return view('tags.edit')->withTag($tag);  
    }

    public function update(Request $request, $id)
    {
      $this->validate($request,[
				'name' => 'required|max:100'
			]);
			$tag = Tag::findOrFail($id);
			$tag->update([
				'name' => $request->name
			]);
			return redirect()->route('tags.index')->with('success','Tag has been updated successfully');			
    }

    public function destroy($id)
    {
      $tag = Tag::findOrFail($id);
      $tag->posts()->detach();
      if($tag->delete()){
        return redirect()->route('tags.index')->with('success','Tag has been deleted successfully');
      }
    }
}
