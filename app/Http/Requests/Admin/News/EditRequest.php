<?php

namespace App\Http\Requests\Admin\News;

use App\Models\News;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditRequest extends FormRequest
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
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'author' => ['nullable', 'string', 'min:3', 'max: 255'],
            'text' => ['nullable', 'string', 'min:10', 'max: 500'],
            'status' => ['required', Rule::in(News::STATUSES)],
            'img' => ['nullable', 'mimes:jpg,bmp,png'],
        ];
    }

    public function attributes()
    {
        return [
            'category_id' => 'категория',
            'title' => 'название новости',
            'author' => 'автор',
            'text' => 'Текст',
            'status' => 'статус',
            'img' => 'изображение',
        ];
    }
}
