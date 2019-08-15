<?php

namespace Tests\Unit;

use App\Http\Requests\TeamRequest;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomTeamRequestTest extends TestCase
{
    /**
     * @param $item
     * @param $data
     * @param $expect
     * @dataProvider dataProvider
     */
    public function testTeamRequest($item, $data, $expect)
    {
        //入力項目、$itemとその値$data
        $dataList = [$item => $data];

        $request = new TeamRequest;
        //TeamRequestで設定したrules()を取得
        $rules = $request->rules();
        //Validatorファサードでバリデーターのインスタンスを取得
        //その際に入力情報とバリデーションを引数で渡す
        $validator = Validator::make($dataList, $rules);
        //入力情報がバリデーションルールを満たしている場合はtrue、満たしていない場合はfalseが返る
        $result = $validator->passes();
        //期待値($expect)と結果($result)を比較
        $this->assertEquals($expect, $result);


    }

    public function dataProvider()
    {
        return[
            ['sports', 'バレーボール', true],
            ['sports', '', false],
            ['sports', false, false],
            ['age', '10代～20代', true],
            ['age', '', false],
            ['age', false, false],
            ['level', '初心者歓迎', true],
            ['level', '', false],
            ['level', false, false],
            ['area', '札幌', true],
            ['area', '', false],
            ['area', false, false],
            ['frequency', '毎週', true],
            ['frequency', '', false],
            ['frequency', false, false],
            ['weekday', '土曜日', true],
            ['weekday', '', false],
            ['weekday', false, false],
            ['hp', 'google.com', true],
            ['url', 'aaa@aaa', false],
        ];
    }
}
