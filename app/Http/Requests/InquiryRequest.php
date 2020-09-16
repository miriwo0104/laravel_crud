<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InquiryRequest extends FormRequest
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
            'content' => ['required'],
            'name' => ['required'],
        ];
    }

    // 下記を追記する
    public function messages()
    {
        return [
            'content.required' => '内容を記入してください。',
            'name.required' => '内容を記入してください。',
        ];
    }
    // 上記までを追記する
}
