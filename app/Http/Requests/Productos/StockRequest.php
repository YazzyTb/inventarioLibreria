<?php

namespace App\Http\Requests\Productos;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StockRequest extends FormRequest
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
            'producto_codigo' => ['required', 'string', 'exists:productos,codigo', 
            Rule::unique('stocks', 'producto_codigo')->ignore($this->route('stock'), 'producto_codigo')],
            'cantidad' => ['required', 'numeric', 'min:0'],
            'max_stock' => ['required', 'numeric', 'min:0'],
            'min_stock' => ['required', 'numeric', 'min:0'],
        ];
    }
}
