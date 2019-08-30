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
            'area' => 'nullable|string',
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
            'sports1.string' => 'スポーツを正しく選択してください',
            'sports2.string' => 'スポーツを正しく選択してください',
            'sports3.string' => 'スポーツを正しく選択してください',
            'sports_years1.integer' => '経験年数は半角数字で入力してください',
            'sports_years2.integer' => '経験年数は半角数字で入力してください',
            'sports_years3.integer' => '経験年数は半角数字で入力してください',
            'age.string' => '年齢を正しく選択してください',
            'sex.string' => '性別を正しく選択してください',
            'area.string' => '活動希望地域を正しく入力してください',
        ];
    }
}
