<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PublicMenuController extends Controller
{
    public function home(Request $request)
    {
        $restaurant = Restaurant::current();
        $locale = $this->locale($request, $restaurant);
        $branches = $restaurant->activeBranches()->get();

        return view('public.home', compact('restaurant', 'branches', 'locale'));
    }

    public function branch(Request $request, Restaurant $restaurant, Branch $branch)
    {
        abort_unless($restaurant->is_active && $branch->restaurant_id === $restaurant->id, 404);
        $locale = $this->locale($request, $restaurant);
        if (! $branch->is_active) {
            return response()->view('public.closed', compact('restaurant', 'branch', 'locale'), 423);
        } $groups = $this->groups($branch);

        return view('public.menu', compact('restaurant', 'branch', 'groups', 'locale'));
    }

    public function qr(Restaurant $restaurant, Branch $branch)
    {
        abort_unless($branch->restaurant_id === $restaurant->id, 404);
        $url = route('menu.branch', [$restaurant, $branch]);
        $qr = QrCode::format('svg')->size(260)->margin(1)->generate($url);

        return response($qr, 200, ['Content-Type' => 'image/svg+xml']);
    }

    public function switchLocale(Request $request)
    {
        $data = $request->validate(['locale' => 'required|in:ar,en']);
        session(['locale' => $data['locale']]);

        return back();
    }

    private function locale(Request $request, Restaurant $restaurant): string
    {
        $locale = $request->query('lang') ?: session('locale') ?: $restaurant->default_locale;
        $locale = in_array($locale, ['ar', 'en'], true) ? $locale : 'en';
        app()->setLocale($locale);

        return $locale;
    }

    private function groups(Branch $branch)
    {
        return $branch->menuItems()->where('menu_items.is_available', true)->wherePivot('is_available', true)->whereHas('category', fn ($q) => $q->where('is_active', true))->with('category')->orderBy('menu_items.sort_order')->get()->groupBy('category_id')->map(fn ($items) => ['category' => $items->first()->category, 'items' => $items])->values();
    }
}
