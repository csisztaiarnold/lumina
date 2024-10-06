<?php

// Returns the asset path for the given file.
if (!function_exists('asset')) {
    function asset($path)
    {
        return app('url')->asset($path);
    }
}

// Fetches published root posts.
if (!function_exists('getParentPosts')) {
    function getParentPosts()
    {
        return \App\Models\Post::where('is_published', '1')->where('parent_id', 0)->get();
    }
}
