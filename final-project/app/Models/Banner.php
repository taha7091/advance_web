<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    // If your table name is different, specify it here
    protected $table = 'banners';

    // Define any fillable fields if needed
    protected $fillable = ['image_url']; // Add 'image_url' to the fillable fields
}
