<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "slug",
        "price",
        "stock",
        "category_id",
        "image",
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function cart() {
        return $this->hasMany(Cart::class, "menu_id");
    }
}
