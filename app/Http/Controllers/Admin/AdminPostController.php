<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class AdminPostController extends Controller
{
    protected Post $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function listPosts($parent_id = null): View|Factory|Application
    {
        $posts = $this->post->where('parent_id', $parent_id ?? 0)->get();
        return view('admin.posts.index', ['posts' => $posts]);
    }
}

