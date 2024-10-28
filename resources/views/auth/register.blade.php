@extends('layouts.app')

@section('content')
<div class="login-container">
    <h2>Register</h2>
    <form method="POST" action="{{ route('register') }}" class="login-form">
        @csrf
        <input type="text" name="username" placeholder="Username" required class="login-input" />
        <input type="password" name="password" placeholder="Password" required class="login-input" />
        <input type="password" name="password_confirmation" placeholder="Confirm Password" required class="login-input" />
        <button type="submit" class="login-button">Register</button>

        @if ($errors->any())
        <div class="error-message">{{ $errors->first() }}</div>
        @endif
    </form>
    <p>Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></p>
</div>
@endsection
