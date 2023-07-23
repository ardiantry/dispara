<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateKategoriEventRequest extends FormRequest
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
            'nama_kategori' => 'required|string|min:3|max:255',
        ];
    }
    public function messages()
    {
        return [
            'string' => 'Hanya angka dan huruf yang diperbolehkan',
            'required' => 'Data tidak boleh kosong',
            'min' => 'Minimal :min Karakter',
            'max' => 'Maksimal :max Karakter',
            'unique' => 'Data tidak boleh sama'
        ];
    }
}
