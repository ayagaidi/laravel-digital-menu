<?php
namespace Tests\Feature;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
class AdminAuthenticationTest extends TestCase
{
 use RefreshDatabase;
 public function test_guest_is_redirected_from_admin():void{$this->get('/admin')->assertRedirect('/admin/login');}
 public function test_active_admin_can_login():void{$u=User::create(['name'=>'Aya','email'=>'aya@example.test','password'=>'secret123','is_active'=>true]);$this->post('/admin/login',['email'=>$u->email,'password'=>'secret123'])->assertRedirect('/admin');$this->assertAuthenticatedAs($u);}
 public function test_disabled_admin_is_rejected():void{$u=User::create(['name'=>'Disabled','email'=>'disabled@example.test','password'=>'secret123','is_active'=>false]);$this->post('/admin/login',['email'=>$u->email,'password'=>'secret123'])->assertSessionHasErrors('email');$this->assertGuest();}
}
