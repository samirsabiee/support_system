<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'department' => ['required', 'numeric', 'digits:1', 'in:0,1,2'],
            'priority' => ['required', 'numeric', 'digits:1', 'in:0,1,2'],
            'text' => ['required', 'string', 'max:500'],
            'file' => ['nullable']
        ];
    }
}
