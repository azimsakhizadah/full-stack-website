<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class PostCategoryController extends Controller
{
   public function index()
    {
        $categories = PostCategory::all();
        return view('admin.backend.post_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.backend.post_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        PostCategory::create($request->all());

        return redirect()->route('post-categories.index')->with('success', 'Category Added');
    }

    public function edit(PostCategory $post_category)
    {
        return view('admin.backend.post_categories.edit', compact('post_category'));
    }

    public function update(Request $request, PostCategory $post_category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $post_category->update($request->all());

        return redirect()->route('post-categories.index')->with('success', 'Category Updated');
    }

    public function destroy(PostCategory $post_category)
    {
        $post_category->delete();
        return redirect()->route('post-categories.index')->with('success', 'Category Deleted');
    }
}
