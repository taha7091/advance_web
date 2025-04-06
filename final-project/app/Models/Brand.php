<?php

// app/Models/Brand.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public static function boot()
    {
        parent::boot();

        static::creating(function ($brand) {
            if (!$brand->slug) {
                $brand->slug = Str::slug($brand->name); // Generate slug from name if not set
            }
        });
    }
}

