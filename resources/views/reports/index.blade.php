@extends('master')

@section('content')
@if (Request::is('reports'))
    <link rel="stylesheet" href="{{ asset('css/reports.css') }}">
@endif
<div class="report-container">
    <h1 class="report-title">Laporan Beasiswa</h1>
    
    <div class="statistics-grid">
        <div class="stat-card">
            <h3>Total Beasiswa</h3>
            <p class="stat-number">{{ $statistics['total_scholarships'] }}</p>
        </div>
        <div class="stat-card">
            <h3>Beasiswa Aktif</h3>
            <p class="stat-number">{{ $statistics['active_scholarships'] }}</p>
        </div>
        <div class="stat-card">
            <h3>Total Pendaftar</h3>
            <p class="stat-number">{{ $statistics['total_applicants'] }}</p>
        </div>
        <div class="stat-card">
            <h3>Total Aplikasi</h3>
            <p class="stat-number">{{ $statistics['applications'] }}</p>
        </div>
    </div>

    <div class="report-form-container">
        <h2 class="form-title">Generate Laporan PDF</h2>
        <form action="{{ route('reports.generate') }}" method="POST" class="report-form">
            @csrf
            <div class="form-row">
                <div class="form-group">
                    <label>Tanggal Mulai</label>
                    <input type="date" name="start_date" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Tanggal Akhir</label>
                    <input type="date" name="end_date" class="form-control" required>
                </div>
            </div>
            <button type="submit" class="btn-generate">Download PDF</button>
        </form>
    </div>
</div>
@endsection

@push('styles')
@endpush
