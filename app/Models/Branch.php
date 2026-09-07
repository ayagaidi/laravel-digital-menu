<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = ['restaurant_id', 'name_ar', 'name_en', 'slug', 'address_ar', 'address_en', 'phone', 'is_active', 'sort_order'];

    protected $casts = ['is_active' => 'boolean'];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class)->orderBy('sort_order');
    }

    public function menuItems()
    {
        return $this->belongsToMany(MenuItem::class, 'branch_menu_item')->withPivot(['is_available', 'price_override'])->withTimestamps();
    }

    protected static function booted(): void
    {
        static::saving(function (self $m) {
            if (! $m->slug) {
                $m->slug = Str::slug($m->name_en ?: 'branch');
            }
        });
    }
}
