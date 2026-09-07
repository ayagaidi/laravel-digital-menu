<?php

namespace Tests\Feature;

use App\Models\Restaurant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MenuAvailabilityTest extends TestCase
{
    use RefreshDatabase;

    public function test_unavailable_pivot_item_is_hidden(): void
    {
        $this->seed();
        $r = Restaurant::current();
        $b = $r->activeBranches()->first();
        $item = $b->menuItems()->first();
        $b->menuItems()->updateExistingPivot($item->id, ['is_available' => false]);
        $this->get(route('menu.branch', [$r, $b]))->assertOk()->assertDontSee($item->name_en);
    }

    public function test_inactive_branch_returns_423(): void
    {
        $this->seed();
        $r = Restaurant::current();
        $b = $r->branches()->first();
        $b->update(['is_active' => false]);
        $this->get(route('menu.branch', [$r, $b]))->assertStatus(423);
    }
}
