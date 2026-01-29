<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'thumbnail',
        'category_id',
        'published_at',
        'is_slider',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected $casts = [
        'published_at' => 'datetime',
    ];
    public function scopeSlider($query)
    {
        return $query->where('is_slider', true)->latest();
    }
}
