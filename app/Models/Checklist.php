<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Checklist extends Model
{
    protected $fillable = [
        'name',
    ];

    public function checklistItems(): HasMany
    {
        return $this->hasMany(ChecklistItem::class, 'checklist_id');
    }
}
