<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreMahasiswaRequest extends FormRequest
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
     * , ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'program_studi_id' => ['required', 'exists:program_studis,id'],
            'nama' => ['required', 'string', 'max:100'],
            'nim' => ['required', 'string', 'max:20', 'unique:mahasiswas,nim'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:mahasiswas,email'],
            'angkatan' => ['required', 'integer', 'max:2100','min:2000'],
            'ipk' => ['nullable', 'numeric', 'min:0', 'max:4'],
            'aktif' => ['nullable', 'boolean'],
        ];
    }
    public function messages(): array{
        return[
            'nim.unique' => 'NIM tersebut sudah terdaftar',
            'email.email' => 'Format Email tidak valid',
            'angkatan.min' => 'Tahun angkatan tidak wajar',

        ];
    }
}
