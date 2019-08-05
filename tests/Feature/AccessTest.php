<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccessTest extends TestCase
{
    public function adminAccess()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('admin');
        $response->assertStatus(302);
    }
}
