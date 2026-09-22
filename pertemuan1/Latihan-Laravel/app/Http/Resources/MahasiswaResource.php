<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MahasiswaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nama' => $this->nama,
            'nim' => $this->nim,
            'email' => $this->email,
            'angkatan' => $this->angkatan,
            'ipk' => (float) $this->ipk,
            'jurusan' => $this->jurusan,
            'program_studi' => $this->whenloaded('programStudi', function () {
                return[
                    'id' => $this->programStudi->id,
                    'nama' => $this->programStudi->nama,
                    'kode' => $this->programStudi->kode,
                ];
            }),
            'dibuat_pada' => $this->created_at->toIso8601String(),
        ];
    }
}
