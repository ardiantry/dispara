<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePengaturanRequest extends FormRequest
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
            'nama_web' => 'required|min:3|max:255|string',
            'email_web' => 'required|email:dns',
            'kontak' => 'required',
            'alamat' => 'required|string',
            'deskripsi_web' => 'required|string',
            'favicon' => 'mimes:ico|max:500',
            'logo_web' => 'image|max:1000|mimes:png,jpg,jpeg,jfif,svg'
        ];
    }

    public function messages()
    {
        return [
            'string' => 'Hanya angka dan huruf yang diperbolehkan',
            'required' => 'Data tidak boleh kosong',
            'favicon.max' => 'Maksimal :max KB',
            'logo_web.max' => 'Maksimal :max KB',
            'mimes' => 'Hanya diperbolehkan :values',
            'image' => 'Jenis file tidak didukung',
            'min' => 'Minimal :min Karakter',
            'max' => 'Maksimal :max Karakter',
            'email' => 'Format bukan email',
        ];
    }
}
