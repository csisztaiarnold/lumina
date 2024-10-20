<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'user_id', 'title', 'title_slug', 'subtitle', 'content', 'is_published', 'published_at'
    ];

    /**
     * Get the children of the post.
     */
    public function children()
    {
        return $this->hasMany(Post::class, 'parent_id')
            ->where('is_published', 1)
            ->with('children');
    }

    /**
     * Get the parent of the post.
     */
    public function parent()
    {
        return $this->belongsTo(Post::class, 'parent_id')
            ->where('is_published', 1);
    }

}
