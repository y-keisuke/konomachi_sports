<?php

namespace Tests\Unit;

use App\Models\Post;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * ポストコントローラーのテスト(登録、更新、削除)
     */
    public function testPostController()
    {
        //外部キー制限解除
        Schema::disableForeignKeyConstraints();

        // 投稿ユーザー作成
        $user = factory(User::class)->create();

        // 投稿先チーム作成
        $team = factory(Team::class)->create([
            'user_id' => $user->id,
        ]);
        //外部キー制限解除を解除
        Schema::enableForeignKeyConstraints();

        // 活動状況一覧 index
        $response = $this->get('posts?team_id=' . $team->id);
        $response->assertOk();

        // 活動状況投稿画面 create
        $response = $this->actingAs($user)->get('posts/create');
        $response->assertOk();

        // 活動状況投稿 store
        $data = [
            'id' => 1,
            'title'    => 'タイトルタイトル',
            'body'       => 'ボディボディボディボディ',
            'user_id' => $user->id,
            'team_id' => $team->id,
        ];
        $this->actingAs($user)->post('posts', $data);
        $this->assertDatabaseHas('posts', $data);
        $post = Post::find(1);

        // 活動状況詳細画面 show
        $response = $this->actingAs($user)->get('posts/' . $post->id);
        $response->assertOk();

        // 活動状況編集画面 edit
        $response = $this->actingAs($user)->get('posts/' . $post->id . '/edit');
        $response->assertOk();

        // 活動状況更新 update
        $data = [
            'user_id' => $user->id,
            'team_id' => $team->id,
            'title'    => 'タタタタタイトル',
            'body'       => 'ボボボボディ',
        ];
        $this->actingAs($user)->put('posts/' . $post->id, $data);
        $this->assertDatabaseHas('posts', $data);

        // 活動状況削除 destroy
        $this->actingAs($user)->delete('posts/' . $post->id);
        $this->assertDatabaseMissing('posts', $data);

    }

}
