<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PortfolioCategory extends Model
{
    protected $fillable = ['name','slug'];

    // optional: auto-generate slug
    public static function booted()
    {
        static::creating(function ($cat) {
            if (empty($cat->slug)) {
                $cat->slug = Str::slug($cat->name);
            }
        });
    }

    public function portfolios()
    {
        return $this->belongsToMany(Portfolio::class, 'category_portfolio')
                    ->withTimestamps();
    }
}
