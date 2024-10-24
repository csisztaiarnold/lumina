<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

/**
 *
 */
class AdminPostController extends Controller
{
    /**
     * @var Post
     */
    protected Post $post;

    /**
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Gets parent hierarchy of a post for the breadcrumb.
     *
     * @param int $postId The post ID.
     * @return array
     */
    public function getParentHierarchy(int $postId = 0): array
    {
        $hierarchy = [];
        $post = $this->post->find($postId);

        while ($post && $post->parent_id) {
            $post = $this->post->find($post->parent_id);
            if ($post) {
                array_unshift($hierarchy, $post);
            }
        }

        return $hierarchy;
    }

    /**
     * Lists posts based on the parent ID.
     *
     * @param int $parent_id The parent post ID.
     * @return View|Factory|Application
     */
    public function listPosts(int $parent_id = 0): View|Factory|Application
    {
        $posts = $this->post->where('parent_id', $parent_id ?? 0)->get()->map(function ($post) {
            $post->children_count = $post->children()->count();
            return $post;
        });

        $current_post = [];
        if($parent_id !== 0) {
            $current_post = $this->post->where('id', $parent_id)->first();
        }
        $hierarchy = $this->getParentHierarchy($current_post->id ?? 0);

        return view('admin.posts.index', [
            'posts' => $posts,
            'hierarchy' => $hierarchy,
            'current_post' => $current_post,
        ]);
    }
}

