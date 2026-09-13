@extends('layouts.app')

@section('judul', 'Daftar Matakuliah')

@section('konten')
    <h1 class="h3 mb-4">Daftar Matakuliah</h1>

    <form method="GET" action="{{ route('matakuliah.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="q" class="form-control"
                   placeholder="Cari matakuliah.." value="{{ $keyword ?? '' }}">
            <button class="btn btn-primary" type="submit">Cari</button>
            @if(!empty($keyword))
                <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary">Reset</a>
            @endif
        </div>
    </form>

    <table class="table table-bordered bg-white">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama Matakuliah</th>
                <th>SKS</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($daftarMatakuliah as $matakuliah)
                <tr>
                    <td>{{ $matakuliah['kode'] }}</td>
                    <td>{{ $matakuliah['nama'] }}</td>
                    <td>
                        <x-badge-sks :sks="$matakuliah['sks']" />
                    </td>
                    <td>
                        <a href="{{ route('matakuliah.show', $matakuliah['kode']) }}"
                           class="btn btn-sm btn-primary">
                            Detail
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Data tidak ditemukan</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection