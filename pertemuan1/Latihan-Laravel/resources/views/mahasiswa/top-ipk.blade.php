@extends('layouts.app')

@section('judul', 'Top 10 IPK Teknik Komputer')

@section('konten')
<h1 class="h3 mb-4">10 Mahasiswa IPK Tertinggi — Teknik Komputer</h1>

<div class="alert alert-info">
    Menampilkan <strong>{{ $top10->count() }}</strong> mahasiswa dengan IPK tertinggi
    dari Program Studi Teknik Komputer.
</div>

<table class="table table-striped bg-white">
    <thead>
        <tr>
            <th>Peringkat</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Angkatan</th>
            <th>IPK</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($top10 as $i => $mahasiswa)
        <tr>
            <td>
                @if ($i === 0) 🥇
                @elseif ($i === 1) 🥈
                @elseif ($i === 2) 🥉
                @else {{ $i + 1 }}
                @endif
            </td>
            <td>{{ $mahasiswa->nim }}</td>
            <td>{{ $mahasiswa->nama }}</td>
            <td>{{ $mahasiswa->angkatan }}</td>
            <td><strong>{{ $mahasiswa->ipk }}</strong></td>
            <td>
                @if ($mahasiswa->aktif)
                    <span class="badge bg-success">Aktif</span>
                @else
                    <span class="badge bg-secondary">Tidak Aktif</span>
                @endif
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">
                Tidak ada mahasiswa Teknik Komputer.
            </td>
        </tr>
        @endforelse
    </tbody>
</table>

<a href="{{ route('mahasiswa.data') }}" class="btn btn-secondary">Kembali</a>
@endsection