<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class PostCategory extends Model
{
    protected $fillable = ['name', 'slug'];

    // One category has many posts
    public function posts()
    {
        return $this->hasMany(Post::class, 'post_category_id');
    }
}
