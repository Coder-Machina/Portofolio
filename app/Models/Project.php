<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'short_desc',
        'full_desc',
        'tech_stack',
        'github_url',
        'live_url',
        'thumbnail',
        'featured',
        'order',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected $casts = [
        'tech_stack' => 'array',
        'featured' => 'boolean',
    ];

    protected static function booted()
    {
        static::creating(function (Project $project) {
            if (empty($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
        });
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true)->orderBy('order');
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
}
