@extends('layouts.app')

@section('content')
<div class="login-container">
    <h2>Login</h2>

    <!-- Pesan sukses jika registrasi berhasil -->
    @if (session('success'))
    <div class="success-message">
        {{ session('success') }}
    </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="login-form">
        @csrf
        <input type="text" name="username" placeholder="Username" required class="login-input" />
        <input type="password" name="password" placeholder="Password" required class="login-input" />
        <button type="submit" class="login-button">Login</button>

        <!-- Pesan error jika login gagal -->
        @if ($errors->any())
        <div class="error-message">
            <i class="fas fa-exclamation-circle"></i> <!-- Ikon untuk menambah visual -->
            {{ $errors->first() }}
        </div>
        @endif
    </form>
    <p>Belum punya akun? <a href="{{ route('register') }}">Register di sini</a></p>
</div>
@endsection
