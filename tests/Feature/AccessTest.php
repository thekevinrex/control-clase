<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccessTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_user_can_access_homepage(): void
    {

        $user = User::factory()->create([
            'super_admin' => 1,
        ]);

        $response = $this->actingAs($user)->get('/');

        $response->assertStatus(200);
    }

    public function test_guest_cannot_access_homepage(): void
    {
        $response = $this->get('/');

        $response->assertStatus(302);
    }
}
