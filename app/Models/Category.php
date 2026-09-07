<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['branch_id', 'name_ar', 'name_en', 'description_ar', 'description_en', 'is_active', 'sort_order'];

    protected $casts = ['is_active' => 'boolean'];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function items()
    {
        return $this->hasMany(MenuItem::class)->orderBy('sort_order');
    }
}
