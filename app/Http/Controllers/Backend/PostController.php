<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class PostController extends Controller
{
    function AllPosts()
    {
        $posts = Post::with('user')->get();
        return view('admin.backend.post.all_posts', compact('posts'));
    }


    public function AddPostForm()
    {
        $categories = PostCategory::all();
        return view('admin.backend.post.add_post', compact('categories'));
    }


    public function AddPost(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'feature_image' => 'nullable|image|max:5048',
        ]);

        $save_url = null;

        if ($request->hasFile('feature_image')) {
            $image = $request->file('feature_image');
            $manager = new ImageManager(new Driver());
            $name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $manager->read($image)->resize(600, 400)
                ->save(public_path('upload/post/' . $name));

            $save_url = 'upload/post/' . $name;
        }

        Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'feature_image' => $save_url,
            'post_category_id' => $request->categories,
            'user_id' => auth('web')->id(),
        ]);

        return redirect()->route('all.posts')
            ->with('message', 'Post added successfully');
    }


    public function UpdatePost(Request $request, $id)
    {
        $posts = Post::findOrFail($id);

        $save_url = $posts->feature_image;

        if ($request->hasFile('feature_image')) {
            if ($posts->feature_image && file_exists(public_path($posts->feature_image))) {
                unlink(public_path($posts->feature_image));
            }

            $image = $request->file('feature_image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image)->resize(600, 400);
            $img->save(public_path('upload/post/' . $name_gen));

            $save_url = 'upload/post/' . $name_gen;
        }

        if ($request->hasFile('feature_image')) {

            // delete old image
            if ($posts->feature_image && file_exists(public_path($posts->feature_image))) {
                unlink(public_path($posts->feature_image));
            }

            $image = $request->file('feature_image');
            $manager = new ImageManager(new Driver());

            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image)->resize(60, 60);
            $img->save(public_path('upload/post/' . $name_gen));

            $save_url = 'upload/post/' . $name_gen;
        }

        $posts->update([
            'title' => $request->title,
            'content' => $request->content,
            'feature_image' => $save_url,
            'post_category_id' => $request->categories,
            
        ]);

        return redirect()->route('all.posts')->with([
            'message' => 'post updated successfully',
            'alert' => 'success'
        ]);
    }

    // Edit
    public function EditPost($id)
    {
        $posts = Post::findOrFail($id);
        $categories = PostCategory::all(); // Add this line
        return view('admin.backend.post.edit_post', compact('posts', 'categories'));
    }


    // Delete
    public function DeletePost($id)
    {
        $posts = Post::findOrFail($id);

        if ($posts->feature_image && file_exists(public_path($posts->featured_image))) {
            unlink(public_path($posts->feature_image));
        }

        $posts->delete();

        return redirect()->back()->with('message', 'Post Deleted Successfully');
    }
}
