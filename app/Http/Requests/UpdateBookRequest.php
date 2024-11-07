<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:250',
            'serial_number' => 'required|string|max:10|regex:/^[0-9]+$/|unique:books,serial_number,'.$this->book->id,
            'published_at' => 'required|date',
            'author_id' => 'required|integer|exists:App\Models\Author,id',
        ];
    }
}
