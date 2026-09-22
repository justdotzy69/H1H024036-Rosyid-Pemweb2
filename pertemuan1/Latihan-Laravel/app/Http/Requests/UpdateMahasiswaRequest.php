<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMahasiswaRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = $this->route('mahasiswa')->id;
        return [
            'program_studi_id' => ['sometimes','integer', 'exists:program_studis,id'],
            'nama' => ['sometimes', 'string', 'max:100'],
            'nim' => ['sometimes', 'string', 'max:20', 'unique:mahasiswas,nim,' . $id],
            'email' => ['sometimes', 'string', 'email', 'max:100', 'unique:mahasiswas,email,' . $id],
            'angkatan' => ['sometimes', 'integer', 'max:2100','min:2000'],
            'ipk' => ['sometimes', 'numeric', 'min:0', 'max:4'],
            'aktif' => ['sometimes', 'boolean'],
            
        ];
    }
}
