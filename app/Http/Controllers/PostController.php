<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;
use Laravel\Lumen\Application;

/**
 * Methods related to posts.
 */
class PostController extends Controller
{
    /**
     * Show the home page.
     *
     * @return View|Application
     */
    public function showHome(): View|Application
    {
        $post = Post::where('is_home', 1)->first();
        return view('index', ['post' => $post]);
    }

    /**
     * Show a single post.
     *
     * @param int $id The post ID.
     * @return View|Application
     */
    public function showPost(int $id): View|Application
    {
        $post = Post::where('is_published', 1)->where('id', $id)->first();

        if (!$post) {
            return view('404');
        }

        return view('index', ['post' => $post]);
    }
}
