@extends('../master') {{-- Extend layout utama --}}

@section('title', 'Home | UBeasiswa') {{-- Set judul halaman --}}

{{-- Tambahkan CSS khusus jika halaman saat ini adalah /register --}}
@if (Request::is('register'))
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endif

@section('content')
<div class="register-container">
    <h1>Daftar</h1>

    {{-- Form registrasi --}}
    <form action="{{ route('register') }}" method="POST" id="registerForm">
        @csrf
        {{-- Input Username --}}
        <div class="form-group">
            <label for="name">Username <span>*</span></label>
            <input type="text" id="name" name="name" placeholder="Masukkan username anda" required>
        </div>

        {{-- Input Email + validasi live --}}
        <div class="form-group">
            <label for="email">Email <span>*</span></label>
            <input type="email" id="email" name="email" placeholder="Masukkan email anda" required>
            <small id="email-status" class="validation-message"></small> {{-- Status validasi email --}}
        </div>

        {{-- Input Password --}}
        <div class="form-group">
            <label for="password">Password <span>*</span></label>
            <input type="password" id="password" name="password" placeholder="Masukkan password anda" required>
        </div>

        {{-- Input Konfirmasi Password --}}
        <div class="form-group">
            <label for="password_confirmation">Konfirmasi Password <span>*</span></label>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Masukkan ulang password anda" required>
        </div>

        {{-- Tombol Submit --}}
        <button type="submit" class="btn-primary" id="submitBtn">Daftar</button>
    </form>
</div>
@endsection

@section('scripts')
{{-- jQuery untuk AJAX validasi email --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
let emailTimeout;
let isEmailValid = false;

// Ketika input email diubah
$('#email').on('input', function() {
    clearTimeout(emailTimeout);
    const email = $(this).val();
    const statusElement = $('#email-status');
    const submitBtn = $('#submitBtn');

    if (!email) {
        statusElement.text('').removeClass('invalid valid');
        submitBtn.prop('disabled', true);
        return;
    }

    // Delay validasi untuk menghindari spam request
    emailTimeout = setTimeout(() => {
        $.ajax({
            url: '{{ route("check-email") }}', // Route backend untuk cek email
            method: 'POST',
            data: {
                email: email,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                // Jika email sudah terdaftar
                if (response.exists) {
                    statusElement.text('Email sudah terdaftar').addClass('invalid').removeClass('valid');
                    $('#email').addClass('invalid-input').removeClass('valid-input');
                    submitBtn.prop('disabled', true);
                    isEmailValid = false;
                } else {
                    // Jika email tersedia
                    statusElement.text('Email tersedia').addClass('valid').removeClass('invalid');
                    $('#email').addClass('valid-input').removeClass('invalid-input');
                    submitBtn.prop('disabled', false);
                    isEmailValid = true;
                }
            }
        });
    }, 500);
});

// Mencegah submit jika email belum tervalidasi
$('#registerForm').on('submit', function(e) {
    if (!isEmailValid) {
        e.preventDefault();
        alert('Silakan gunakan email yang valid dan belum terdaftar');
    }
});
</script>
@endsection
