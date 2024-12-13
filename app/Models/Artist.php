<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $table = 'artists_table';

    // Define the primary key
    protected $primaryKey = 'artist_id';

    // Disable timestamps if not using created_at and updated_at columns
    public $timestamps = false;

    // Define the fillable fields
    protected $fillable = ['artist_name'];
}
