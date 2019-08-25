<?php

namespace Tests\Unit;

use App\Models\Post;
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

        // ダミーで利用するデータ
        $data = [
            'title'    => 'タイトルタイトル',
            'body'       => 'ボディボディボディボディ',
        ];
        $post = factory(Post::class)->create($data);

        //ダミーデータを取得
        $this->assertDatabaseHas('posts', $data);

        //ダミーデータを更新
        $post->title = 'タタタタタイトル';
        $post->save();
        $data['title'] = 'タタタタタイトル';
        $this->assertDatabaseHas('posts', $data);

        //ダミーデータを削除
        $post->delete();
        $this->assertDatabaseMissing('posts', $data);

        //外部キー制限解除を解除
        Schema::enableForeignKeyConstraints();
    }

}
