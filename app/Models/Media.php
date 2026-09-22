<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';

    protected $fillable = [
        'name',
        'file_name',
        'file_path',
        'mime_type',
        'file_size',
        'alt_text',
    ];

    public function isImage(): bool
    {
        if (str_starts_with($this->mime_type ?? '', 'image/')) {
            return true;
        }

        $extension = strtolower(pathinfo($this->file_name ?? $this->file_path, PATHINFO_EXTENSION));
        return in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg', 'bmp']);
    }

    public function getUrlAttribute(): string
    {
        if (!$this->file_path) {
            return '';
        }

        if (str_starts_with($this->file_path, 'http://') || str_starts_with($this->file_path, 'https://')) {
            return $this->file_path;
        }

        return asset('storage/' . ltrim($this->file_path, '/'));
    }
}