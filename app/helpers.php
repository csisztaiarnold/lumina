<?php

// Fetches published root posts.
if (!function_exists('getParentPostsForNavigation')) {
    function getParentPosts()
    {
        return \App\Models\Post::where('is_published', '1')->where('parent_id', 0)->get();
    }
}
