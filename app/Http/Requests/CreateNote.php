<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNote extends FormRequest
{
    /**
     * Determine If The User Is Authorized To Make This Request.
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get The Validation Rules That Apply To The Request.
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:5', 'max:255'],
            'content' => ['required', 'string', 'min:20', 'max:255'],
            'category_id' => ['required', 'numeric', 'min:1', 'exists:categories,id']
        ];
    }

    /**
     * Get All Data
     * @return array
     */
    public function getData(): array
    {
        return [
            'title' => $this->input('title'),
            'content' => $this->input('content'),
            'category_id' => $this->input('category_id')
        ];
    }
}
