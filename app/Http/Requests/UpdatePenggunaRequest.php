<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePenggunaRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nama' => "required|regex:/^[a-zA-Z\s']{3,255}+$/|min:3|max:255",
            'email' => 'required|email|regex:/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/|min:6|max:30',
            'password' => '',
            'gambar' => 'mimes:png,jpg,jpeg|max:5000|image',
            'no_hp' => ['required', 'min:11', 'max:17', 'regex:/^(\+62|62)?[\s-]?0?8[1-9]{1}\d{1}[\s-]?\d{4}[\s-]?\d{2,5}$/'],
            'instansi' => 'required|min:3|max:255|string',
        ];
    }

    public function messages()
    {
        return [
            'nama.regex' => "Hanya boleh mengandung huruf, karakter spesial ( ' ), dan spasi (tidak mengandung angka dan karakter spesial)",
            'required' => 'Kolom wajib diisi',
            'max' => 'Maksimal :max karakter',
            'min' => 'Minimal :min karakter',
            'string' => 'Format salah',
            'regex' => 'Masukkan format yang benar',
            'mimes' => 'Format yang diperbolehkan :values',
            'image' => 'Format harus gambar',
            'gambar.max' => 'Maksimal 5mb',
            'email.email' => 'Format bukan email'
        ];
    }
}
