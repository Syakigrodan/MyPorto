<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['title', 'issuer', 'category', 'issued_date', 'credential_url', 'description', 'sort_order'])]
class Certificate extends Model
{
    public const CATEGORIES = ['Web Development', 'Cloud & DevOps', 'UI/UX Design', 'Data & AI', 'Other'];

    protected function casts(): array
    {
        return [
            'issued_date' => 'date',
        ];
    }
}
