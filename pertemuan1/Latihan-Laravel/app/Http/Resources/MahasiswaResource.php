<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MahasiswaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $semua = [
            'id' => $this->id,
            'nama' => $this->nama,
            'nim' => $this->nim,
            'email' => $this->email,
            'angkatan' => $this->angkatan,
            'ipk' => (float) $this->ipk,
            'jurusan' => $this->jurusan,
            'aktif' => $this->aktif,
            'program_studi' => $this->whenLoaded('programStudi', function () {
                return [
                    'id' => $this->programStudi->id,
                    'nama' => $this->programStudi->nama,
                    'kode' => $this->programStudi->kode,
                ];
            }),
            'dibuat_pada' => $this->created_at->toIso8601String(),
        ];

        if ($request->filled('fields')) {
            $diminta = array_map('trim', explode(',', $request->query('fields')));

            $hasil = [];
            foreach ($diminta as $kolom) {
                if (array_key_exists($kolom, $semua)) {
                    $hasil[$kolom] = $semua[$kolom];
                }
            }

            return $hasil;
        }

        return $semua;
    }
}