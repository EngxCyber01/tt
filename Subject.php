<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['semester_id', 'code', 'name', 'instructor', 'schedule', 'description'];

    protected $hidden = ['created_at', 'updated_at'];

    /**
     * Get the semester that owns this subject
     */
    public function semester(): BelongsTo
    {
        return $this->belongsTo(Semester::class);
    }

    /**
     * Get the PDF files for this subject
     */
    public function pdfs(): HasMany
    {
        return $this->hasMany(PdfFile::class);
    }

    /**
     * Get the department through semester
     */
    public function department()
    {
        return $this->semester->department;
    }
}
