<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function task(): HasMany
    {
        return $this->hasMany(Task::class, 'project_id')->orderBy('priority_id');
    }
}
