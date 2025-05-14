@extends('master')

@section('title', 'Daftar Beasiswa | UBeasiswa')

@section('content')
<div class="scholarship-page">
    <h1 class="page-title">Daftar Beasiswa yang Tersedia</h1>

    <!-- Notifikasi -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Search and Sort Section -->
    <div class="search-sort">
        <input type="text" class="search-input" placeholder="Cari Beasiswa">
        <select class="sort-select">
            <option value="name">Sortir</option>
            <option value="open_registration">Tanggal Pendaftaran</option>
            <option value="deadline">Deadline</option>
        </select>
    </div>

    <!-- Scholarship Grid -->
    <div class="scholarship-grid">
        @foreach($scholarships as $scholarship)
        <div class="scholarship-card">
            <div class="card-image">
                <img src="{{ $scholarship->logo }}" alt="{{ $scholarship->name }}">
            </div>
            <div class="card-content">
                <h3 class="scholarship-name">{{ $scholarship->name }}</h3>
                <p class="scholarship-dates">
                    <strong>Open Registration:</strong> {{ \Carbon\Carbon::parse($scholarship->open_registration)->format('d M Y') }}<br>
                    <strong>Deadline:</strong> {{ \Carbon\Carbon::parse($scholarship->deadline)->format('d M Y') }}
                </p>
                <p class="scholarship-organization">
                    <strong>Penyelenggara:</strong> {{ $scholarship->organization }}
                </p>
            </div>
            <div class="card-footer">
                <form action="{{ route('beasiswa.register', $scholarship->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Daftar</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection