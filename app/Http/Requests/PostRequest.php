<?php

namespace App\Http\Requests;

use App\Models\Team;
use App\Models\TeamUser;
use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'user_id' => 'required',
            'team_id' => 'required',
            'title' => 'required|string|max:150',
            'body' => 'required|string|max:2000',
        ];
    }

    /**
     * バリデーションメッセージ
     *
     * @return array
     */
    public function messages() {
        return [
            'title.required' => 'タイトルは必ず入力してください',
            'title.max' => 'タイトルは150字以内で入力してください',
            'body.required' => '本文は必ず入力してください',
            'body.max' => '本文は2000字以内で入力してください',
        ];
    }
}
