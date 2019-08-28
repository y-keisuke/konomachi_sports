<?php

namespace Tests\Feature;

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FollowTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testFollow()
    {
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

        // ユーザーフォロー
        $this->actingAs($user)->post('follows', ['user_id' => $user2->id]);
        $this->assertDatabaseHas('follows', [
            'follow_user_id' => $user->id,
            'followed_user_id' => $user2->id,
        ]);
        $this->actingAs($user)->delete('follows', ['user_id' => $user2->id]);
        $this->assertDatabaseMissing('follows', [
            'follow_user_id' => $user->id,
            'followed_user_id' => $user2->id,
        ]);
    }
}
