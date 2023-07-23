<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
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
            'image' => 'required|image|max:5000|mimes:png,jpg,jpeg,jfif,svg',
            'title' => 'required|string|min:3|max:255',
            'kategori_id' => 'required|string',
            'isi' => 'required|string|min:3',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date',
            'author' => ''
        ];
    }
    public function messages()
    {
        return [
            'string' => 'Hanya angka dan huruf yang diperbolehkan',
            'required' => 'Data tidak boleh kosong',
            'image.max' => 'Maksimal :max KB',
            'mimes' => 'Hanya diperbolehkan :values',
            'image' => 'Jenis file tidak didukung',
            'min' => 'Minimal :min Karakter',
            'max' => 'Maksimal :max Karakter',
        ];
    }
}
