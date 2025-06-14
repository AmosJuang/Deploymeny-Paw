@extends('master')

@section('title', 'Daftar Beasiswa | UBeasiswa')

@section('content')
<div class="scholarship-page">
    <h1 class="page-title">Daftar Beasiswa yang Tersedia</h1>

    <!-- Menampilkan notifikasi sukses -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Menampilkan notifikasi error -->
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Form pencarian dan penyortiran beasiswa -->
    <div class="search-sort">
        <form id="searchForm" action="{{ route('beasiswa.search') }}" method="GET">
            <!-- Input pencarian berdasarkan nama beasiswa -->
            <input type="text" name="search" id="searchInput" class="search-input" placeholder="Cari Beasiswa" value="{{ request('search') }}">

            <!-- Dropdown untuk sortir berdasarkan nama, tanggal pendaftaran, atau deadline -->
            <select name="sort" id="sortSelect" class="sort-select" onchange="this.form.submit()">
                <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Sortir</option>
                <option value="open_registration" {{ request('sort') == 'open_registration' ? 'selected' : '' }}>Tanggal Pendaftaran</option>
                <option value="deadline" {{ request('sort') == 'deadline' ? 'selected' : '' }}>Deadline</option>
            </select>
        </form>
    </div>

    <!-- Grid daftar beasiswa -->
    <div class="scholarship-grid">
        @foreach($scholarships as $scholarship)
        <div class="scholarship-card">
            <!-- Logo beasiswa -->
            <div class="card-image">
                <img src="{{ $scholarship->logo }}" alt="{{ $scholarship->name }}">
            </div>

            <!-- Informasi beasiswa -->
            <div class="card-content">
                <h3 class="scholarship-name">{{ $scholarship->name }}</h3>

                <!-- Tanggal penting beasiswa -->
                <p class="scholarship-dates">
                    <strong>Open Registration:</strong> {{ \Carbon\Carbon::parse($scholarship->open_registration)->format('d M Y') }}<br>
                    <strong>Deadline:</strong> {{ \Carbon\Carbon::parse($scholarship->deadline)->format('d M Y') }}
                </p>

                <!-- Penyelenggara -->
                <p class="scholarship-organization">
                    <strong>Penyelenggara:</strong> {{ $scholarship->organization }}
                </p>
            </div>

            <!-- Tombol daftar beasiswa -->
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

@section('scripts')
<script>
// Menambahkan delay pada input search agar tidak mengirim request terlalu sering
document.getElementById('searchInput').addEventListener('input', debounce(function() {
    document.getElementById('searchForm').submit();
}, 500));

// Fungsi debounce untuk menunda eksekusi fungsi agar lebih efisien
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}
</script>
@endsection
