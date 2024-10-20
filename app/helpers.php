<?php

/**
 * Get parent posts for the navigation.
 *
 * @return mixed
 */
if (!function_exists('getParentPosts')) {
    function getParentPosts()
    {
        return \App\Models\Post::where('is_published', '1')
            ->where('parent_id', 0)
            ->get();
    }
}
