<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class UserDashboardAccessTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_admin_user_can_access_dashboard(): void
    {
        $adminRole = Role::create(['name' => 'admin']);
        // Create user if not exists
        $adminUser = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password')
        ])->assignRole($adminRole);
        $response = $this->actingAs($adminUser)->get('/user-dashboard');
        $response = $this->get('/user-dashboard');
        $response->assertStatus(200);
    }
}
