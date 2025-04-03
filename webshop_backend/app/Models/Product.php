<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'price',
        'slug',
        'color_id',
        'brand_id',
    ];

    // Item pripada jednoj boji
    public function color()
    {
        return $this->belongsTo(Colors::class);
    }

    // Item pripada jednom brandu
    public function brand()
    {
        return $this->belongsTo(Brands::class);
    }

    // Item može imati više kategorija (many-to-many)
    public function categories()
    {
        return $this->belongsToMany(Categories::class, 'product_category');
    }

    // Item može imati više veličina (many-to-many)
    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'product_size');
    }

    // Item može imati više popusta (many-to-many)
    public function discounts()
    {
        return $this->belongsToMany(Discounts::class, 'product_discounts');
    }

    // Item može imati više slika (one-to-many)
    public function images()
    {
        return $this->hasMany(Images::class);
    }
}
