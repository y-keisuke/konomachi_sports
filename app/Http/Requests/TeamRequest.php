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
            'age' => 'required|integer',
            'level' => 'required|string',
            'area' => 'required|string',
            'frequency' => 'required|string',
            'hp' => 'nullable|url',
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
            'sports.required'      => 'スポーツは入力必須です。',
            'age.required'         => '年齢層は入力必須です。',
            'level.required'       => '募集対象は入力必須です。',
            'area.required'        => '地域は入力必須です。',
            'frequency.required'   => '活動頻度は入力必須です。',
            'hp.url'               => 'ホームページは有効なURL形式で入力してください。'
        ];
    }
}
