<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    // Fillable fields
    protected $fillable = [
        'title',
        'album_id',
        'url',
        // Add other fillable fields here
    ];

    // Relationships
    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
