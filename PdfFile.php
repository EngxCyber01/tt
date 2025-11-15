<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PdfFile extends Model
{
    use HasFactory;

    protected $table = 'pdf_files';

    protected $fillable = ['subject_id', 'title', 'url', 'file_path', 'date', 'size', 'type'];

    protected $hidden = ['created_at', 'updated_at', 'file_path'];

    /**
     * Get the subject that owns this PDF
     */
    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    /**
     * Get the preview URL for this PDF
     */
    public function getPreviewUrl()
    {
        if (str_contains($this->url, 'drive.google.com')) {
            if (preg_match('/\/d\/([^\/]+)\//', $this->url, $matches)) {
                return "https://drive.google.com/file/d/{$matches[1]}/preview";
            }
        }
        
        if ($this->file_path && file_exists(storage_path('app/public/' . $this->file_path))) {
            return asset('storage/' . $this->file_path);
        }
        
        return $this->url;
    }
}
