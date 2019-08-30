<?php

namespace Tests\Feature;

use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class AccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_access(): void
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
            'admin' => 0,
        ]);
        $response = $this->actingAs($user)->get('/admin');
        $response->assertStatus(302);
        $response = $this->actingAs($user)->get('/hogehoge');
        $response->assertStatus(404);

        //外部キー制限解除を解除
        Schema::enableForeignKeyConstraints();
    }

    public function test_login_user_access(): void
    {
        // ログインユーザー

        //外部キー制限解除
        Schema::disableForeignKeyConstraints();
        // テスト用ユーザー作成
        $user = factory(User::class)->create();
        $user2 = factory(User::class)->create();
        // テスト用チーム作成
        $team = factory(Team::class)->create([
            'user_id' => $user->id,
        ]);
        //外部キー制限解除を解除
        Schema::enableForeignKeyConstraints();

        // チーム編集ページ
        $response = $this->actingAs($user)->get('teams/' . $team->id . 'edit');
        $response->assertOk();

        // ユーザー詳細画面
        $response = $this->actingAs($user)->get('users/' . $user2->id);
        $response->assertSee('<input type="submit" class="btn btn-primary" value="フォローする">');
        $response->assertSee('<input type="submit" value="メッセージを送る" class="btn btn-primary">');

        // チーム詳細画面
        $response = $this->actingAs($user)->get('teams/' . $team->id);
        $response->assertSee('<input type="submit" class="btn btn-primary" value="お気に入り登録する">');
    }

    public function test_all_user_access(): void
    {
        // 未ログインユーザーもアクセス可能

        //外部キー制限解除
        Schema::disableForeignKeyConstraints();
        // テスト用チーム作成
        $team = factory(Team::class)->create();
        // テスト用ユーザー作成
        $user = factory(User::class)->create();
        //外部キー制限解除を解除
        Schema::enableForeignKeyConstraints();

        // トップページ
        $response = $this->get('/');
        $response->assertStatus(200);

        // 検索ページ
        $response = $this->get('/search');
        $response->assertStatus(200);

        // ユーザー登録ページ
        $response = $this->get('/users/create');
        $response->assertStatus(200);

        // ユーザー詳細ページ
        $response = $this->get('/users/' . $user->id);
        $response->assertStatus(200);
        $response->assertDontSee('<input type="submit" class="btn btn-primary" value="フォローする">');
        $response->assertDontSee('<input type="submit" value="メッセージを送る" class="btn btn-primary">');

        // チーム詳細ページ
        $response = $this->get('/teams/' . $team->id);
        //$response->assertStatus(200);
        $response->assertDontSee('<input type="submit" class="btn btn-primary" value="お気に入り登録する">');
    }
}
