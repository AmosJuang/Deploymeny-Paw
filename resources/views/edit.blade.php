
@extends('master')

@section('title', 'Edit Profil - UBeasiswa')

@if (Request::is('profile/edit'))
    <link rel="stylesheet" href="{{ asset('css/edit_profile.css') }}">
@endif

@section('content')
<div class="register-container">
    <h1>Edit Profil</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama <span>*</span></label>
            <input type="text" id="name" name="name" placeholder="Masukkan nama anda" value="{{ old('name', $user->name ?? '') }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email <span>*</span></label>
            <input type="email" id="email" name="email" placeholder="Masukkan email anda" value="{{ old('email', $user->email ?? '') }}" required>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection