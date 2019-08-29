<?php

namespace Tests\Unit;

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeamControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * チームコントローラーのテスト(登録、更新、削除)
     */
    public function testTeamController()
    {
        //外部キー制限解除
        Schema::disableForeignKeyConstraints();

        // 投稿ユーザー作成
        $user = factory(User::class)->create();
        $user2 = factory(User::class)->create([
            'admin' => 1,
        ]);

        // チーム一覧 index
        // adminユーザーのみアクセス可能
        $response = $this->actingAs($user)->get('teams');
        $response->assertStatus(302);
        $response = $this->actingAs($user2)->get('teams');
        $response->assertOk();

        // チーム作成画面 create
        $response = $this->actingAs($user)->get('teams/create');
        $response->assertOk();

        // チーム作成 store
        $data = [
            'sports' => 'サッカー',
            'area' => '北海道札幌市',
            'age' => '10代～20代',
            'level' => '初心者歓迎',
            'frequency' => '毎週',
            'weekday' => '土曜日',
            'user_id' => $user->id,
        ];
        $this->actingAs($user)->post('teams', $data);
        $this->assertDatabaseHas('teams', $data);

        // チームデータ取得
        $team = Team::find(1);

        // チーム詳細画面 show
        $response = $this->actingAs($user)->get('teams/' . $team->id);
        $response->assertOk();

        // 活動状況編集画面 edit
        $response = $this->actingAs($user)->get('teams/' . $team->id . '/edit');
        $response->assertOk();

        // チーム情報更新 update
        $data = [
            'sports' => 'バレーボール',
            'area' => '北海道札幌市',
            'age' => '10代～20代',
            'level' => '初心者歓迎',
            'frequency' => '毎週',
            'weekday' => '土曜日',
            'user_id' => $user->id,
        ];
        $this->actingAs($user)->put('teams/' . $team->id, $data);
        $this->assertDatabaseHas('teams', $data);

        // チーム削除 destroy
        $this->actingAs($user)->delete('teams/' . $team->id);
        $this->assertDatabaseMissing('teams', $data);

        //外部キー制限解除を解除
        Schema::enableForeignKeyConstraints();

    }
}
