<?php

namespace Tests\Feature;

use App\Http\Middleware\AdminAuth;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

        $user = factory(User::class)->create([
            'admin' => 1,
        ]);

        $response = $this->actingAs($user)->get('/admin');
        dump($response);
        $response->assertStatus(200);

        $user = factory(User::class)->create([
            'admin'=> 0,
        ]);
        $response = $this->actingAs($user)->get('/admin');
        $response->assertStatus(302);
        $response = $this->actingAs($user)->get('/hogehoge');
        $response->assertStatus(404);

        //外部キー制限解除を解除
        Schema::enableForeignKeyConstraints();
    }
}
