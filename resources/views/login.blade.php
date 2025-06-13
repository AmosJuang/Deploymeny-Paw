@extends('master')

@section('title', 'Login')
@if (Request::is('login'))
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endif

@section('content')
<div class="login-container">
    <h1>Masuk</h1>
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">Email <span>*</span></label>
            <input type="email" id="email" name="email" placeholder="Masukkan email anda" required>
        </div>
        <div class="form-group">
            <label for="password">Password <span>*</span></label>
            <input type="password" id="password" name="password" placeholder="Masukkan password anda" required>
        </div>
        <div class="form-group">
            <a href="{{ route('forget-password') }}" class="forgot-password">Lupa Password?</a>
        </div>
        <button type="submit" class="btn-primary">Masuk</button>
    </form>
</div>
@endsection