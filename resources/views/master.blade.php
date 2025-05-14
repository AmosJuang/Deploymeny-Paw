<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blog')</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/program.css">
    <link rel="stylesheet" href="/css/mentor.css">
    <link rel="stylesheet" href="/css/beasiswa.css">
    
    <script src="{{ asset('js/home.js') }}"></script>
</head>
<body>
    @include('header')
 
    <div class="container">
        @yield('content')
    </div>
 
    @include('footer')
</body>
</html>
 