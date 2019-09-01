<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
            'board_id' => 'required|integer',
            'user_id' => 'required|integer',
            'message' => 'required|string',
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
            'board_id.required' => 'board r',
            'board_id.integer' => 'board i',
            'user_id.required' => 'user r',
            'user_id.integer' => 'user i',
            'message.required' => 'メッセージは必ず入力してください',
            'message.string' => 'メッセージは文字列で入力してください',
        ];
    }
}
