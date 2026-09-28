<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMatakuliahRequest;
use App\Http\Requests\UpdateMatakuliahRequest;
use App\Http\Resources\MatakuliahResource;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $kuri = Matakuliah::query();

        if ($request->filled('cari')) {
            $kataKunci = $request->query('cari');
            $kuri->where(function ($sub) use ($kataKunci) {
                $sub->where('nama', 'like', '%' . $kataKunci . '%')
                    ->orWhere('kode', 'like', '%' . $kataKunci . '%');
            });
        }

        if ($request->filled('semester')) {
            $kuri->where('semester', $request->integer('semester'));
        }

        $urutan = $request->query('urut', 'nama');
        $arah = $request->query('arah', 'asc');
        $kolomDiizinkan = ['nama', 'kode', 'sks', 'semester'];

        if (in_array($urutan, $kolomDiizinkan, true)) {
            $kuri->orderBy($urutan, $arah === 'desc' ? 'desc' : 'asc');
        }

        $perHalaman = min($request->integer('per_halaman', 10), 100);

        return MatakuliahResource::collection($kuri->paginate($perHalaman));
        
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMatakuliahRequest $request): JsonResponse
    {
        $matakuliah = Matakuliah::create($request->validated());

        return response()->json([
            'sukses' => true,
            'pesan' => 'Data mata kuliah berhasil dibuat',
            'data' => new MatakuliahResource($matakuliah),
        ], 201);
    }

    public function show(Matakuliah $matakuliah): JsonResponse
    {
        return response()->json([
            'sukses' => true,
            'data' => new MatakuliahResource($matakuliah),
        ]);
    }

    public function update(UpdateMatakuliahRequest $request, Matakuliah $matakuliah): JsonResponse
    {
        $matakuliah->update($request->validated());

        return response()->json([
            'sukses' => true,
            'pesan' => 'Data mata kuliah berhasil diperbarui',
            'data' => new MatakuliahResource($matakuliah),
        ]);
    }

    public function destroy(Matakuliah $matakuliah): JsonResponse
    {
        $matakuliah->delete();

        return response()->json([
            'sukses' => true,
            'pesan' => 'Data mata kuliah berhasil dihapus',
        ]);
    }
}