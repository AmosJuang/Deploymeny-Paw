@extends('master')

@section('title', 'Profil Saya')
@if (Request::is('profile'))
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endif
@section('content')
<div class="profile-container">
    <div class="profile-card">
        <h2>{{ Auth::user()->name }}</h2>
        <p class="profile-email">{{ Auth::user()->email }}</p>

        <a href="{{ route('profile.edit') }}" class="btn-edit-profile">Edit Profil</a>

        <h3 class="section-title">Beasiswa yang Diikuti</h3>
        @if($scholarships->isEmpty())
            <p class="no-scholarship">Belum mengikuti beasiswa apapun.</p>
        @else
            <ul class="scholarship-list">
                @foreach($scholarships as $scholarship)
                    <li class="scholarship-item">
                        <div class="scholarship-header">
                            <h4>{{ $scholarship->name }}</h4>
                            <span class="scholarship-organization">{{ $scholarship->organization }}</span>
                        </div>
                        <div class="scholarship-details">
                            <p><strong>Pendaftaran:</strong> {{ \Carbon\Carbon::parse($scholarship->open_registration)->format('d M Y') }}</p>
                            <p><strong>Deadline:</strong> {{ \Carbon\Carbon::parse($scholarship->deadline)->format('d M Y') }}</p>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
        <form action="{{ route('profile.delete') }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus akun? Semua data akan hilang!');">
            @csrf
            <button type="submit" class="btn-delete-account">Hapus Akun</button>
        </form>
    </div>
</div>
@endsection