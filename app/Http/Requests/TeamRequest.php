<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'sports' => 'required|string',
            'age' => 'required|string',
            'level' => 'required|string',
            'area' => 'required|string',
            'frequency' => 'required|string',
            'weekday' => 'required|string',
            'hp' => 'nullable|url',
            'user_id' => 'required',
        ];
    }

    /**
     * バリデーションメッセージ
     *
     * @return array
     */
    public function messages()
    {
        return [
            'sports.required' => 'スポーツを選択してください',
            'sports.string' => '文字列を入力してください',
            'age.required' => '年齢層を選択してください',
            'age.string' => '文字列を入力してください',
            'level.required' => '募集対象を選択してください',
            'level.string' => '文字列を入力してください',
            'area.required' => '地域は入力必須です',
            'area.string' => '文字列を入力してください',
            'frequency.required' => '活動頻度を選択してください',
            'frequency.string' => '文字列を入力してください',
            'weekday.required' => '活動頻度を選択してください',
            'weekday.string' => '文字列を入力してください',
            'hp.url' => 'ホームページは有効なURL形式で入力してください',
            'user_id.required' => 'user_idは必須',
        ];
    }
}
