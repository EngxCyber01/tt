<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Semester extends Model
{
    use HasFactory;

    protected $fillable = ['department_id', 'number', 'description'];

    protected $hidden = ['created_at', 'updated_at'];

    /**
     * Get the department that owns this semester
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Get the subjects for this semester
     */
    public function subjects(): HasMany
    {
        return $this->hasMany(Subject::class);
    }
}
