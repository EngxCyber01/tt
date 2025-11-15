<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'name', 'description'];

    protected $hidden = ['created_at', 'updated_at'];

    /**
     * Get the semesters for this department
     */
    public function semesters(): HasMany
    {
        return $this->hasMany(Semester::class);
    }

    /**
     * Get all subjects through semesters
     */
    public function subjects()
    {
        return $this->hasManyThrough(Subject::class, Semester::class);
    }
}
