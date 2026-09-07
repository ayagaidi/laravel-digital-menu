<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Category;
use App\Models\MenuItem;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $restaurant = Restaurant::updateOrCreate(['slug' => 'nova-cafe'], ['name_ar' => 'نوفا كافيه', 'name_en' => 'Nova Cafe', 'description_ar' => 'بيانات تجريبية عامة لمشروع مفتوح المصدر.', 'description_en' => 'Generic demo data for the open-source starter.', 'primary_color' => '#0f766e', 'secondary_color' => '#134e4a', 'default_locale' => 'en', 'is_active' => true]);
        $branch = Branch::updateOrCreate(['restaurant_id' => $restaurant->id, 'slug' => 'downtown'], ['name_ar' => 'فرع وسط المدينة', 'name_en' => 'Downtown Branch', 'address_ar' => 'طرابلس، ليبيا — عنوان تجريبي', 'address_en' => 'Tripoli, Libya — demo address', 'is_active' => true, 'sort_order' => 1]);
        $coffee = Category::updateOrCreate(['branch_id' => $branch->id, 'name_en' => 'Coffee'], ['name_ar' => 'القهوة', 'description_en' => 'Espresso-based drinks', 'description_ar' => 'مشروبات القهوة', 'is_active' => true, 'sort_order' => 1]);
        $food = Category::updateOrCreate(['branch_id' => $branch->id, 'name_en' => 'Food'], ['name_ar' => 'الأطباق', 'description_en' => 'Fresh demo dishes', 'description_ar' => 'أطباق تجريبية', 'is_active' => true, 'sort_order' => 2]);
        $items = [[$coffee, 'Cappuccino', 'كابتشينو', 12.00, 1], [$coffee, 'Iced Latte', 'آيس لاتيه', 15.00, 2], [$food, 'Avocado Toast', 'توست أفوكادو', 24.00, 1], [$food, 'Chicken Bowl', 'طبق الدجاج', 30.00, 2]];
        foreach ($items as [$cat,$en,$ar,$price,$order]) {
            $item = MenuItem::updateOrCreate(['category_id' => $cat->id, 'name_en' => $en], ['name_ar' => $ar, 'price' => $price, 'is_available' => true, 'sort_order' => $order]);
            $item->branches()->syncWithoutDetaching([$branch->id => ['is_available' => true]]);
        }
        $password = env('SEED_ADMIN_PASSWORD');
        if ($password) {
            User::updateOrCreate(['email' => env('SEED_ADMIN_EMAIL', 'admin@example.test')], ['name' => env('SEED_ADMIN_NAME', 'Demo Admin'), 'password' => $password, 'is_active' => true]);
        }
    }
}
