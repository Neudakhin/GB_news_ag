<?php

namespace App\Http\Requests\Admin\Orders;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'phone' => ['required', 'regex:/(\d|\+|\-|\.|\(|\)){3,20}/i', 'min:3', 'max: 255'],
            'email' => ['required', 'email:rfc,dns', 'min:3', 'max: 255'],
            'description' => ['required', 'string', 'min:10', 'max: 500'],
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'имя',
            'phone' => 'номер телефона',
            'email' => 'Email-адрес',
            'description' => 'описание к заказу',
        ];
    }
}
