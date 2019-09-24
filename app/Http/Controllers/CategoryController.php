<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
			$categories = Category::all();
			return view('categories.index',compact('categories'));
    }

    public function store(Request $request)
    {
      $this->validate($request,[
				'name' => 'required|max:100'
			]);
			$categories = Category::create([
				'name' => $request->name
			]);
			return redirect()->route('categories.index')->with('success','New Category has been Created');	
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
			return view('categories.index');
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
