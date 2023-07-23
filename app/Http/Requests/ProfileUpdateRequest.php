<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'profile_image_path' => ['mimes:png,jpg,jpeg,jfif', 'max:1500', 'image']
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Data tidak boleh kosong',
            'string' => 'Hanya angka dan huruf yang diperbolehkan',
            'image.max' => 'Maksimal :max KB',
            'email' => 'Format email salah',
            'mimes' => 'Hanya diperbolehkan :values',
            'image' => 'Jenis file tidak didukung',
            'min' => 'Minimal :min Karakter',
            'max' => 'Maksimal :max Karakter',
            'unique' => 'Data tidak boleh sama'
        ];
    }
}
