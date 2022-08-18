<?php

namespace Modules\Medicine\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMedicineReuqest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'bar_code' => ['nullable', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'generic_name' => ['required', 'string', 'max:255'],
            'details' => ['nullable', 'string'],
            'strength' => ['nullable', 'string', 'max:255'],
            'shelf' => ['nullable', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'manufacturer_price' => ['required', 'numeric', 'min:0'],
            'image' => ['nullable', 'image', 'min:0'],
            'status' => ['required', 'boolean'],
            'vat' => ['nullable', 'numeric'],
            'igta' => ['nullable', 'numeric'],
            'category' => ['required', 'string', 'exists:categories,id'],
            'unit' => ['required', 'string', 'exists:units,id'],
            'type' => ['required', 'string', 'exists:types,id'],
            'leaf' => ['required', 'string', 'exists:leafs,id'],
            'manufacturer' => ['required', 'string', 'exists:users,id'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
