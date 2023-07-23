<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class StoreBukuTamuRequest extends FormRequest
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
            'pelindung' => 'required|string|min:3',
            'no_hp' => 'required|min:10|numeric|unique:buku_tamus,no_hp',
            'alamat' => 'required|min:3',
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],

        ];
    }

    public function messages()
    {
        return [
            'string' => 'Hanya angka dan huruf yang diperbolehkan',
            'required' => 'Data tidak boleh kosong',
            'min' => 'Minimal hanya :min Karakter',
            'max' => 'Maksimal hanya :max Karakter',
            'confirmed' => 'Konfirmasi password salah',
            'numeric' => 'Hanya angka yang diperbolehkan',
            'email' => 'Format harus email',
            'unique' => 'Terjadi kesalahan atau Anda pernah mendaftar sebelumnya'
        ];
    }
}
