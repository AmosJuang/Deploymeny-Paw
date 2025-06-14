<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Judul halaman, default-nya 'Blog' jika tidak di-set --}}
    <title>@yield('title', 'Blog')</title>

    {{-- Font utama --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- File CSS terpisah untuk modularitas halaman --}}
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/program.css">
    <link rel="stylesheet" href="/css/mentor.css">
    <link rel="stylesheet" href="/css/beasiswa.css">
    <link rel="stylesheet" href="/css/profile.css">

    {{-- Icon library --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    {{-- Script utama (pastikan file ini memang ada di public/js/home.js) --}}
    <script src="{{ asset('js/home.js') }}"></script>
</head>
<body>
    {{-- Include header/navbar dari file Blade terpisah --}}
    @include('header')

    {{-- Bagian utama isi halaman --}}
    <div class="container">
        @yield('content')
    </div>

    {{-- Slot tambahan untuk script spesifik tiap halaman --}}
    @yield('scripts')
</body>
</html>
