@extends('master')

@section('title', 'Profil Saya')

{{-- Hanya load CSS jika berada di route /profile --}}
@if (Request::is('profile'))
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endif

@section('content')

<div class="profile-container">
    <div class="profile-card">

        {{-- Menampilkan nama user yang sedang login --}}
        <h2>{{ Auth::user()->name }}</h2>

        {{-- Menampilkan email user --}}
        <p class="profile-email">{{ Auth::user()->email }}</p>

        {{-- Tombol menuju halaman edit profil --}}
        <a href="{{ route('profile.edit') }}" class="btn-edit-profile">Edit Profil</a>

        {{-- Section beasiswa yang diikuti --}}
        <h3 class="section-title">Beasiswa yang Diikuti</h3>

        {{-- Jika user belum pernah ikut beasiswa --}}
        @if($scholarships->isEmpty())
            <p class="no-scholarship">Belum mengikuti beasiswa apapun.</p>
        @else
            {{-- Tampilkan daftar beasiswa --}}
            <ul class="scholarship-list">
                @foreach($scholarships as $scholarship)
                    <li class="scholarship-item">

                        {{-- Header beasiswa: nama & organisasi --}}
                        <div class="scholarship-header">
                            <h4>{{ $scholarship->name }}</h4>
                            <span class="scholarship-organization">{{ $scholarship->organization }}</span>
                        </div>

                        {{-- Detail tanggal beasiswa --}}
                        <div class="scholarship-details">
                            <p><strong>Pendaftaran:</strong> 
                                {{ \Carbon\Carbon::parse($scholarship->open_registration)->format('d M Y') }}
                            </p>
                            <p><strong>Deadline:</strong> 
                                {{ \Carbon\Carbon::parse($scholarship->deadline)->format('d M Y') }}
                            </p>
                        </div>

                    </li>
                @endforeach
            </ul>
        @endif

        {{-- Tombol hapus akun --}}
        <form action="{{ route('profile.delete') }}" method="POST"
              onsubmit="return confirm('Yakin ingin menghapus akun? Semua data akan hilang!');">
            @csrf
            <button type="submit" class="btn-delete-account">Hapus Akun</button>
        </form>

    </div>
</div>

@endsection
