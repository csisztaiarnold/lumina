<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;
use Laravel\Lumen\Application;

/**
 * Class containing methods related to posts.
 */
class PostController extends Controller
{
    /**
     * @var Post
     */
    protected Post $post;

    /**
     * PostController constructor.
     *
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Show the home page.
     *
     * @return View
     */
    public function showHome(): View
    {
        $post = $this->post->where('is_home', 1)->first();
        return view('index', ['post' => $post, 'home_post_id' => $post->id]);
    }

    /**
     * Show a single post.
     *
     * @param string $slug The post slug.
     * @param int $id The post ID.
     * @return View
     */
    public function showPost(string $slug, int $id): View
    {
        $post = $this->post->firstWhere(['is_published' => 1, 'id' => $id]);
        $home_post_id = $this->post->where('is_home', 1)->value('id');

        if (!$post) {
            return view('404');
        }

        // Show a feed view if the post is a feed.
        if ($post->is_feed === 1) {
            $children = $post->children()->where('is_published', 1)->paginate($post->subs_paginated_by);
            return view('feed', ['post' => $post, 'feed' => $children, 'home_post_id' => $home_post_id]);
        }

        return view('index', ['post' => $post, 'home_post_id' => $home_post_id]);
    }
}
