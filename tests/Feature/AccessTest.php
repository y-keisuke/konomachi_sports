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

    use RefreshDatabase;

    public function testAllUserAccess()
    {
        // 未ログインユーザーもアクセス可能
        $responce = $this->get('/');
        $responce->assertStatus(200);

        $responce = $this->get('/search');
        $responce->assertStatus(200);

        $response = $this->get('/users/create');
        $response->assertStatus(200);

        $responce = $this->from('/users/create')->post('/register', ['name' => '山田 太郎', 'email' => 'example@example.com', 'password' => 'password']);
        $this->assertDatabaseHas('users', ['name' => '山田 太郎']);
        $responce->assertStatus(200);
    }

    public function testAdminAccess()
    {

        //管理者のみアクセス可能
        $responce = $this->get('/users');
        $responce->assertStatus(302);

        $response = $this->get('/admin');
        $response->assertStatus(302);

        //外部キー制限解除
        Schema::disableForeignKeyConstraints();

        $user = factory(User::class)->create([
            'admin' => 1,
        ]);

        $response = $this->actingAs($user)->get('/admin');
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
