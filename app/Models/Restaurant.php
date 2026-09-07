<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = ['name_ar', 'name_en', 'slug', 'description_ar', 'description_en', 'primary_color', 'secondary_color', 'default_locale', 'is_active'];

    protected $casts = ['is_active' => 'boolean'];

    public function branches()
    {
        return $this->hasMany(Branch::class)->orderBy('sort_order');
    }

    public function activeBranches()
    {
        return $this->branches()->where('is_active', true);
    }

    public static function current(): self
    {
        return static::where('is_active', true)->firstOrFail();
    }

    protected static function booted(): void
    {
        static::saving(function (self $m) {
            if (! $m->slug) {
                $m->slug = Str::slug($m->name_en ?: 'restaurant');
            }
        });
    }
}
