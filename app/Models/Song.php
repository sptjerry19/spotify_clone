<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $table = 'songs'; // Optional if your table is named differently

    protected $fillable = ['title', 'artist', 'album', 'duration', 'genre'];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    protected $casts = [
        'duration' => 'integer',  // casting duration as an integer
    ];
}
