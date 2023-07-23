<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePenggunaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
   

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama' => "required|regex:/^[a-zA-Z\s']{3,255}+$/|min:3|max:255",
            'email' => 'required|email|regex:/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/|min:6|max:30|unique:tb_pengguna,email',
            'password' => 'required|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
            'gambar' => 'mimes:png,jpg,jpeg|max:5000|image',
            'no_hp' => ['required', 'unique:tb_pengguna,no_hp', 'min:11', 'max:17', 'regex:/^(\+62|62)?[\s-]?0?8[1-9]{1}\d{1}[\s-]?\d{4}[\s-]?\d{2,5}$/'],
            'instansi' => 'required|min:3|max:255|string',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Kolom wajib diisi',
            'nama.regex' => "Hanya boleh mengandung huruf, petik satu ( ' ), dan spasi (tidak mengandung angka dan karakter spesial)",
            'password.regex' => 'Panjang minimal 8 karakter, bermuat 1 huruf besar, 1 huruf kecil, 1 angka, dan 1 karakter spesial',
            'max' => 'Maksimal :max karakter',
            'min' => 'Minimal :min karakter',
            'unique' => 'Data sudah ada',
            'regex' => 'Masukkan format yang benar',
            'string' => 'Masukkan format yang benar',
            'email' => 'Format bukan email',
            'gambar.max' => 'Maksimal 5mb',
            'email.unique' => 'Email telah terdaftar',
            'image' => 'Format harus gambar',
            'mimes' => 'Format yang diperbolehkan :values',
        ];
    }
}
