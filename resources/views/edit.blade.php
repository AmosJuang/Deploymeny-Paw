@extends('master') {{-- Menggunakan layout utama --}}

@section('title', 'Edit Profil - UBeasiswa') {{-- Set judul halaman di browser/tab --}}

{{-- Kalau sedang di halaman /profile/edit, maka load CSS khusus --}}
@if (Request::is('profile/edit'))
    <link rel="stylesheet" href="{{ asset('css/edit_profile.css') }}">
@endif

@section('content')
<div class="register-container">
    <h1>Edit Profil</h1>

    {{-- Kalau ada notifikasi sukses dari session, tampilkan di sini --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Kalau ada notifikasi error dari session, tampilkan juga --}}
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    {{-- Form untuk update data profil --}}
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf {{-- Proteksi CSRF token biar gak bisa disalahgunakan --}}

        {{-- Input Nama --}}
        <div class="form-group">
            <label for="name">Nama <span>*</span></label>
            <input type="text" id="name" name="name" placeholder="Masukkan nama anda"
                value="{{ old('name', $user->name ?? '') }}" required>
            {{-- Tampilkan error kalau validasi nama gagal --}}
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- Input Email --}}
        <div class="form-group">
            <label for="email">Email <span>*</span></label>
            <input type="email" id="email" name="email" placeholder="Masukkan email anda"
                value="{{ old('email', $user->email ?? '') }}" required>
            {{-- Tampilkan error kalau validasi email gagal --}}
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tombol untuk simpan perubahan --}}
        <button type="submit" class="btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
