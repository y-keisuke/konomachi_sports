<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Schema;
use Tests\TestCase;
use App\Models\Team;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SearchTest extends TestCase
{

    use RefreshDatabase;

    public function testSearch()
    {
        //外部キー制限解除
        Schema::disableForeignKeyConstraints();

        // 検索ページへアクセス
        $response = $this->get('/search');
        $response->assertStatus(200);

        // 検索用データ作成
        factory(\App\Models\Team::class, 50)->create();
        $response = $this->get('/search', [
            'sports' => 'サッカー'
        ]);
        $response->assertDontSeeText('バレーボール');
        $response->assertDontSeeText('ラグビー');

        //外部キー制限解除を解除
        Schema::enableForeignKeyConstraints();
    }
}
