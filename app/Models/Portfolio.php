<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
     protected $fillable = [
        'title','description','image','client','website','duration'
    ];

    public function categories()
    {
        return $this->belongsToMany(PortfolioCategory::class, 'category_portfolio')
                    ->withTimestamps();
    }
}
