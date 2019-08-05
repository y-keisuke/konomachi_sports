<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccessTest extends TestCase
{
    public function testAdminAccess()
    {
        //外部キー制限解除
        Schema::disableForeignKeyConstraints();

        $user1 = factory(User::class)->create([
            'name' => '管理者',
            'email' => 'info@konomachi-sports.com',
        ]);
        $response = $this->actingAs($user1)->get('admin');
        $response->assertStatus(200);

        $user2 = factory(User::class)->create([
            'name' => 'テストユーザー',
            'email' => 'test@example.com',
        ]);
        $response = $this->actingAs($user2)->get('admin');
        $response->assertStatus(302);

        //外部キー制限解除を解除
        Schema::enableForeignKeyConstraints();
    }
}
