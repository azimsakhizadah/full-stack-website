<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'feature_image',
        'content',
        'excerpt',
        'status',
        'published_at',
        'user_id',
        'post_category_id', // added
    ];

    // Auto-generate slug if not provided
    public static function booted()
    {
        static::creating(function ($post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }
        });
    }

    // Post belongs to a category
    public function category()
    {
        return $this->belongsTo(PostCategory::class, 'post_category_id');
    }

    // Post belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
