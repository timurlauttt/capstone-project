<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'title', 'slug', 'category_id', 'description', 'price', 'unit', 'stock', 'status'
    ];

    public function images()
    {
        return $this->hasMany(ProductImage::class)->orderBy('sort_order');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function farmer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function inquiries()
    {
        return $this->hasMany(Inquiry::class);
    }
}
