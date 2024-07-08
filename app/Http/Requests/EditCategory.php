<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditCategory extends FormRequest
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
     * Get The Validation Rules That Apply To Rhe Request.
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:5', 'max:255'],
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
            'name' => $this->input('name'),
        ];
    }

    /**
     * Receives The Category ID
     * @return integer
     */
    public function getCategoryId(): int
    {
        return $this->input('category_id');
    }
}