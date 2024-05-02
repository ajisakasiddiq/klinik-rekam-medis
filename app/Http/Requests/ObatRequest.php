<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ObatRequest extends FormRequest
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
            'nama_obat' => 'required|string',
            'stok' => 'required|string',
            'harga_beli' => 'required|string',
            'harga_jual' => 'required|string',
            'satuan' => 'required|string',
        ];
    }
}
