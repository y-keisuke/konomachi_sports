<?php

namespace Tests\Feature;

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LikeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLike()
    {
        //外部キー制限解除
        Schema::disableForeignKeyConstraints();
        // テスト用ユーザー作成
        $user = factory(User::class)->create();
        // テスト用チーム作成
        $team = factory(Team::class)->create([
            'user_id' => $user->id,
        ]);
        //外部キー制限解除を解除
        Schema::enableForeignKeyConstraints();

        // チームお気に入り登録
        $this->actingAs($user)->post('likes', ['team_id' => $team->id]);
        $this->assertDatabaseHas('likes', [
            'like_user_id' => $user->id,
            'liked_team_id' => $team->id,
        ]);
        $this->actingAs($user)->delete('likes', ['team_id' => $team->id]);
        $this->assertDatabaseMissing('likes', [
            'like_user_id' => $user->id,
            'liked_team_id' => $team->id,
        ]);
    }
}
