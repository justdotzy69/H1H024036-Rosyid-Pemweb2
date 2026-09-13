@php
    $warna = $sks < 3 ? 'bg-primary' : 'bg-success';
@endphp

<span class="badge {{ $warna }}">{{ $sks }} SKS</span>