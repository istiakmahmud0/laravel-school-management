<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_login_view_load(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
    public function test_user_login(): void
    {
        $response = $this->get('/login');
        $user = \App\Models\User::factory()->create();
        $this->post('login', [
            'email' => $user->email,
            'password' => 'password',
        ]);
        $this->assertTrue(Auth::check());
    }
}
