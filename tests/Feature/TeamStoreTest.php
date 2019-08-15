<?php

namespace Tests\Feature;

use App\Models\Team;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeamStoreTest extends TestCase
{
    /**
     * @param $params
     */
    public function testTeamStore()
    {
        //外部キー制限解除
        Schema::disableForeignKeyConstraints();

        $url = url('teams/store');
        $params = factory(Team::class, 1)->create();dump($params);
        $response = $this->post($url, $params);
        $response->assertStatus(200);

        //外部キー制限解除を解除
        Schema::enableForeignKeyConstraints();
    }

    /**
     * データプロバイダー
     * @return array
     */
    public function storingTeamData()
    {
        return [
            'user_id' => 5,
            'sports' => 'サッカー',
            'age' => '20代～30代',
            'level' => '経験者募集',
            'area' => '札幌',
            'frequency' => '毎週',
            'weekday' => '木曜日',
            'hp' => 'google.com',
        ];
    }
}
