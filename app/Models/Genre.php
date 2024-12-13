<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Genre extends Model
{
    use HasFactory;

    protected $table = 'genres_table';

    protected $fillable = [
        'name'
    ];

    // Define the relationship with the Album model
    public function albums()
    {
        return $this->hasMany(Album::class);
    }
}
