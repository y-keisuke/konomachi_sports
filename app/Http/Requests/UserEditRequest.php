<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email',
            'sports1' => 'nullable|string',
            'sports_years1' => 'nullable|integer',
            'sports2' => 'nullable|string',
            'sports_years2' => 'nullable|integer',
            'sports3' => 'nullable|string',
            'sports_years3' => 'nullable|integer',
            'age' => 'nullable|string',
            'sex' => 'nullable|string',
            'area' => 'nullable|url',
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
            'name.required' => '名前は入力必須です',
            'email.required' => 'メールアドレスは入力必須です',
            'sports.required' => 'スポーツを選択してください',
            'age.required' => '年齢層を選択してください',
            'level.required' => '募集対象を選択してください',
            'area.required' => '地域は入力必須です',
            'frequency.required' => '活動頻度を選択してください',
            'weekday.required' => '活動頻度を選択してください',
            'hp.url' => 'ホームページは有効なURL形式で入力してください',
        ];
    }
}
