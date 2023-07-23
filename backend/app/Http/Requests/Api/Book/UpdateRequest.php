<?php

namespace App\Http\Requests\Api\Book;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'slug' => 'required|string',
            'author' => 'required|string',
            'description' => 'required|string',
            'rating' => 'nullable|integer',
            'preview_image' => 'nullable|file',
            'main_image' => 'nullable|file',
            'category_ids' => 'nullable|array',
            'category_ids.*' => 'nullable|integer|exists:tags,id',
        ];
    }
}
