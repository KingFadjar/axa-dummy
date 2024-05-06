<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post; // Tambahkan baris ini
use App\Models\Album; // Tambahkan baris ini

class User extends Model
{
    use HasFactory;

    // Fillable fields
    protected $fillable = [
        'name',
        'email',
        // Add other fillable fields here
    ];

    // Hidden fields
    protected $hidden = [
        'password',
        'remember_token',
        // Add other hidden fields here
    ];

    // Relationships
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function albums()
    {
        return $this->hasMany(Album::class);
    }
}
