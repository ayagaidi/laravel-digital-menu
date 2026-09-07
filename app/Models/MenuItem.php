<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'name_ar', 'name_en', 'description_ar', 'description_en', 'ingredients_ar', 'ingredients_en', 'price', 'image_path', 'is_available', 'is_featured', 'sort_order'];

    protected $casts = ['price' => 'decimal:2', 'is_available' => 'boolean', 'is_featured' => 'boolean'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function branches()
    {
        return $this->belongsToMany(Branch::class, 'branch_menu_item')->withPivot(['is_available', 'price_override'])->withTimestamps();
    }
}
