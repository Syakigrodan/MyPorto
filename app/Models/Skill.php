<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'icon', 'category', 'level', 'sort_order'])]
class Skill extends Model
{
    public const CATEGORIES = ['Frontend', 'Backend', 'DevOps', 'Tools'];
}
