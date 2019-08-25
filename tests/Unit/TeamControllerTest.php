<?php

namespace Tests\Unit;

use App\Models\Team;
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

        // ダミーで利用するデータ
        $data = [
            'sports'    => 'バレーボール',
            'age'       => '10代～20代',
            'level'     => '初心者歓迎',
            'frequency' => '毎週',
            'weekday'   => '金曜日',
        ];
        $team = factory(Team::class)->create($data);

        //ダミーデータを取得
        $this->assertDatabaseHas('teams', $data);

        //ダミーデータを更新
        $team->sports = 'サッカー';
        $team->save();
        $data['sports'] = 'サッカー';
        $this->assertDatabaseHas('teams', $data);

        //ダミーデータを削除
        $team->delete();
        $this->assertDatabaseMissing('teams', $data);

        //外部キー制限解除を解除
        Schema::enableForeignKeyConstraints();
    }
}
