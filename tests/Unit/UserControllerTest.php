<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * ユーザーコントローラーのテスト(登録、更新、削除)
     */
    public function test_user_controller(): void
    {
        //外部キー制限解除
        Schema::disableForeignKeyConstraints();

        // ダミーで利用するデータ
        $data = [
            'name' => '山田太郎',
        ];
        $user = factory(User::class)->create($data);

        //ダミーデータを取得
        $this->assertDatabaseHas('users', $data);

        //ダミーデータを更新
        $user->name = '山田花子';
        $user->save();
        $data['name'] = '山田花子';
        $this->assertDatabaseHas('users', $data);

        //ダミーデータを削除
        $user->delete();
        $this->assertDatabaseMissing('users', $data);

        //外部キー制限解除を解除
        Schema::enableForeignKeyConstraints();
    }
}
