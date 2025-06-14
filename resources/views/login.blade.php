{{-- Extends layout utama --}}
@extends('master')

{{-- Set judul halaman --}}
@section('title', 'Login')

{{-- Tambahkan CSS khusus login jika path saat ini adalah /login --}}
@if (Request::is('login'))
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endif

{{-- Isi konten utama --}}
@section('content')
<div class="login-container">
    <h1>Masuk</h1>

    {{-- Tampilkan alert jika ada pesan error --}}
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    {{-- Tampilkan alert jika ada pesan sukses --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Form login --}}
    <form action="{{ route('login') }}" method="POST">
        @csrf {{-- Proteksi CSRF Laravel --}}

        {{-- Input email --}}
        <div class="form-group">
            <label for="email">Email <span>*</span></label>
            <input type="email" id="email" name="email" placeholder="Masukkan email anda" required>
        </div>

        {{-- Input password --}}
        <div class="form-group">
            <label for="password">Password <span>*</span></label>
            <input type="password" id="password" name="password" placeholder="Masukkan password anda" required>
        </div>

        {{-- Link lupa password --}}
        <div class="form-group">
            <a href="{{ route('forget-password') }}" class="forgot-password">Lupa Password?</a>
        </div>

        {{-- Tombol submit --}}
        <button type="submit" class="btn-primary">Masuk</button>
    </form>
</div>
@endsection
