<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;

    // Mass assignable fields
    protected $fillable = ['title', 'artist', 'genre'];

    // Relasi: Satu musik bisa punya banyak review
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
