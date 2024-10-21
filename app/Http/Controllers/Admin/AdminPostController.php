<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    protected Post $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function listPosts()
    {
        $posts = $this->post->all();
        $nav =     $posts = \App\Models\Post::where('is_published', '1')
            ->where('parent_id', 0)
            ->with('children')
            ->get();
        return view('admin.posts.index', ['nav' => $nav, 'posts' => $posts]);
    }

    public function createPost(Request $request)
    {
        $post = $this->post->create($request->all());
        return redirect()->route('admin.posts.index');
    }

    public function editPost(int $id, Request $request)
    {
        $post = $this->post->findOrFail($id);
        $post->update($request->all());
        return redirect()->route('admin.posts.index');
    }

    public function deletePost(int $id)
    {
        $post = $this->post->findOrFail($id);
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}

