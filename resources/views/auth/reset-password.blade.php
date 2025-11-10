@extends('layouts.auth')
@section('title', 'Reset Kata Sandi')

@section('content')
<form method="POST" action="{{ route('password.update') }}">
  @csrf
  <input type="hidden" name="token" value="{{ $token }}">
  <input type="email" name="email" placeholder="Alamat Email" required>
  <input type="password" name="password" placeholder="Kata Sandi Baru" required>
  <input type="password" name="password_confirmation" placeholder="Konfirmasi Kata Sandi Baru" required>
  <button type="submit">Reset Password</button>
</form>
<a href="{{ route('login') }}">Kembali ke Halaman Login</a>
@endsection
