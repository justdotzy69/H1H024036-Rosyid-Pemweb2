<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    private function data()
    {
        return [
            ['kode' => 'TK245001', 'nama' => 'Sistem Kendali', 'sks' => 3],
            ['kode' => 'TK245002', 'nama' => 'Keamanan Jaringan Komputer', 'sks' => 2],
            ['kode' => 'TK245004', 'nama' => 'Internet of Things', 'sks' => 3],
            ['kode' => 'TK245006', 'nama' => 'Etika Profesi', 'sks' => 2],
            ['kode' => 'TK245009', 'nama' => 'Pemrograman Web II', 'sks' => 2],
        ];
    }

    public function index(Request $request)
    {
        $daftarMatakuliah = $this->data();
        $keyword = $request->query('q');

        if ($keyword) {
            $daftarMatakuliah = array_filter($daftarMatakuliah, function ($item) use ($keyword) {
                return stripos($item['nama'], $keyword) !== false
                    || stripos($item['kode'], $keyword) !== false;
            });
        }

        return view('matakuliah.index', [
            'daftarMatakuliah' => $daftarMatakuliah,
            'keyword' => $keyword,
        ]);
    }

    public function show(string $kode)
    {
        $matakuliah = collect($this->data())->firstWhere('kode', $kode);

        if (!$matakuliah) {
            abort(404, 'Matakuliah tidak ditemukan');
        }

        return view('matakuliah.show', ['matakuliah' => $matakuliah]);
    }
}