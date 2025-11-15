<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'subject_id'];

    protected $hidden = ['created_at', 'updated_at'];

    public $timestamps = true;

    /**
     * Get the user that owns this favorite
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the subject that is favorited
     */
    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }
}
