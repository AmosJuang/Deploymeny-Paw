@extends('master') {{-- Menggunakan layout utama --}}

@section('title', 'Profil Saya') {{-- Set judul halaman --}}

{{-- Jika path URL adalah /profile, maka tambahkan CSS khusus --}}
@if (Request::is('profile'))
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endif

@section('content')
<div class="profile-container">
    <div class="profile-card">
        {{-- Menampilkan nama dan email user yang sedang login --}}
        <h2>{{ Auth::user()->name }}</h2>
        <p class="profile-email">{{ Auth::user()->email }}</p>

        <h3 class="section-title">Beasiswa yang Diikuti</h3>

        {{-- Jika user belum mendaftar beasiswa --}}
        @if($scholarships->isEmpty())
            <p class="no-scholarship">Belum mengikuti beasiswa apapun.</p>
        @else
            {{-- Menampilkan daftar beasiswa yang diikuti user --}}
            <ul class="scholarship-list">
                @foreach($scholarships as $scholarship)
                    <li class="scholarship-item">
                        <div class="scholarship-header">
                            <h4>{{ $scholarship->name }}</h4>
                            <span class="scholarship-organization">{{ $scholarship->organization }}</span>
                        </div>
                        <div class="scholarship-details">
                            {{-- Format tanggal pendaftaran dan deadline --}}
                            <p><strong>Pendaftaran:</strong> {{ \Carbon\Carbon::parse($scholarship->open_registration)->format('d M Y') }}</p>
                            <p><strong>Deadline:</strong> {{ \Carbon\Carbon::parse($scholarship->deadline)->format('d M Y') }}</p>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
@endsection
