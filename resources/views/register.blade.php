@extends('../master')

@section('title', 'Home | UBeasiswa')

@if (Request::is('register'))
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endif

@section('content')
<div class="register-container">
    <h1>Daftar</h1>
    <form action="{{ route('register') }}" method="POST" id="registerForm">
        @csrf
        <div class="form-group">
            <label for="name">Username <span>*</span></label>
            <input type="text" id="name" name="name" placeholder="Masukkan username anda" required>
        </div>
        <div class="form-group">
            <label for="email">Email <span>*</span></label>
            <input type="email" id="email" name="email" placeholder="Masukkan email anda" required>
            <small id="email-status" class="validation-message"></small>
        </div>
        <div class="form-group">
            <label for="password">Password <span>*</span></label>
            <input type="password" id="password" name="password" placeholder="Masukkan password anda" required>
        </div>
        <div class="form-group">
            <label for="password_confirmation">Konfirmasi Password <span>*</span></label>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Masukkan ulang password anda" required>
        </div>
        <button type="submit" class="btn-primary" id="submitBtn">Daftar</button>
    </form>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
let emailTimeout;
let isEmailValid = false;

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

    emailTimeout = setTimeout(() => {
        $.ajax({
            url: '{{ route("check-email") }}',
            method: 'POST',
            data: {
                email: email,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.exists) {
                    statusElement.text('Email sudah terdaftar').addClass('invalid').removeClass('valid');
                    $(this).addClass('invalid-input').removeClass('valid-input');
                    submitBtn.prop('disabled', true);
                    isEmailValid = false;
                } else {
                    statusElement.text('Email tersedia').addClass('valid').removeClass('invalid');
                    $(this).addClass('valid-input').removeClass('invalid-input');
                    submitBtn.prop('disabled', false);
                    isEmailValid = true;
                }
            }
        });
    }, 500);
});

$('#registerForm').on('submit', function(e) {
    if (!isEmailValid) {
        e.preventDefault();
        alert('Silakan gunakan email yang valid dan belum terdaftar');
    }
});
</script>
@endsection