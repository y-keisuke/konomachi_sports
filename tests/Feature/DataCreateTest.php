<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Team;
use App\Models\Post;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DataCreateTest extends TestCase
{
    use RefreshDatabase;

    /**
     * ユーザー情報を登録して、取得
     */
    public function testUserDataCreate()
    {
        //外部キー制限解除
        Schema::disableForeignKeyConstraints();

        // ダミーで利用するデータ
        factory(User::class)->create([
            'name' => '山田太郎',
        ]);

        //外部キー制限解除を解除
        Schema::enableForeignKeyConstraints();

        //上で作成したデータを取得
        $this->assertDatabaseHas('users', [
            'name' => '山田太郎',
        ]);
    }

    /**
     * チーム情報を登録して、取得
     */
    public function testTeamDataCreate()
    {
        //外部キー制限解除
        Schema::disableForeignKeyConstraints();

        // ダミーで利用するデータ
        factory(Team::class)->create([
            'sports'    => 'バレーボール',
            'age'       => '10代～20代',
            'level'     => '初心者歓迎',
            'frequency' => '毎週',
            'weekday'   => '金曜日',
        ]);

        //外部キー制限解除を解除
        Schema::enableForeignKeyConstraints();

        //上で作成したデータを取得
        $this->assertDatabaseHas('teams', [
            'sports'    => 'バレーボール',
            'age'       => '10代～20代',
            'level'     => '初心者歓迎',
            'frequency' => '毎週',
            'weekday'   => '金曜日',
        ]);
    }

    /**
     * 活動内容を登録して、取得
     */
    public function testPostDataCreate()
    {
        //外部キー制限解除
        Schema::disableForeignKeyConstraints();

        // ダミーで利用するデータ
        factory(Post::class)->create([
            'title'    => 'タイトルタイトル',
            'body'       => 'ボディボディボディボディ',
        ]);

        //外部キー制限解除を解除
        Schema::enableForeignKeyConstraints();

        //上で作成したデータを取得
        $this->assertDatabaseHas('posts', [
            'title'    => 'タイトルタイトル',
            'body'       => 'ボディボディボディボディ',
        ]);
    }
}
