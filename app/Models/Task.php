<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function priority(): BelongsTo
    {
        return $this->belongsTo(Priority::class);
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
    
}
