<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

#[Fillable(['title', 'slug', 'description', 'image', 'category', 'year', 'link', 'github', 'tech_stack', 'featured', 'sort_order'])]
class Project extends Model
{
    protected function casts(): array
    {
        return [
            'tech_stack' => 'array',
            'featured' => 'boolean',
        ];
    }

    protected static function booted(): void
    {
        static::saving(function (Project $project) {
            if (empty($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
        });
    }
}
