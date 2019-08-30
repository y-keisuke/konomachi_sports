<?php

namespace Tests\Feature;

use App\Models\Team;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class SearchTest extends TestCase
{
    use RefreshDatabase;

    public function test_search(): void
    {
        // 外部キー制限解除
        Schema::disableForeignKeyConstraints();
        // 検索用データ作成
        factory(Team::class, 50)->create();
        // 外部キー制限解除を解除
        Schema::enableForeignKeyConstraints();

        // 検索ページへアクセス
        $response = $this->get('/search');
        $response->assertStatus(200);

        // 「スポーツ サッカー」を検索
        $response = $this->get('/search?sports=サッカー&area=&age=&level=&frequency=&weekday=');
        $response->assertDontSeeText('テニス');
        $response->assertDontSeeText('野球');
        $response->assertDontSeeText('バレーボール');
        $response->assertDontSeeText('ラグビー');
        $response->assertDontSeeText('バスケットボール');

        // 「スポーツ ラグビー、募集対象 初心者歓迎」を検索
        $response = $this->get('/search?sports=ラグビー&area=&age=&level=初心者歓迎&frequency=&weekday=');
        $response->assertDontSeeText('テニス');
        $response->assertDontSeeText('野球');
        $response->assertDontSeeText('バレーボール');
        $response->assertDontSeeText('サッカー');
        $response->assertDontSeeText('バスケットボール');
        $response->assertDontSeeText('経験者募集');
        $response->assertDontSeeText('ガチ勢募集');
        $response->assertDontSeeText('経験問いません');

        // 「活動頻度 毎週」を検索
        $response = $this->get('/search?sports=&area=&age=&level=&frequency=毎週&weekday=');
        $response->assertDontSeeText('2週間に1回');
        $response->assertDontSeeText('3週間に1回');
        $response->assertDontSeeText('1ヶ月に1回');

        // 検索情報をリセット
        $response = $this->post('/search');
        $response->assertSeeText('50件'); //リセットで全データ(50件)が表示されているか確認
    }
}
