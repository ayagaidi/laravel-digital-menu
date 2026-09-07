<?php

namespace Tests\Feature;

use App\Models\Restaurant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicMenuTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_renders_demo_restaurant(): void
    {
        $this->seed();
        $this->get('/')->assertOk()->assertSee('Nova Cafe');
    }

    public function test_locale_switch_is_stored_in_session(): void
    {
        $this->seed();
        $this->from('/')->post('/locale', ['locale' => 'ar'])->assertRedirect('/');
        $this->assertEquals('ar', session('locale'));
    }

    public function test_branch_menu_renders_available_items(): void
    {
        $this->seed();
        $r = Restaurant::current();
        $b = $r->activeBranches()->first();
        $this->get(route('menu.branch', [$r, $b]))->assertOk()->assertSee('Cappuccino')->assertSee('Avocado Toast');
    }
}
