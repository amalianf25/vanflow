@extends('layouts.auth')
@section('title', 'Lupa Kata Sandi')

@section('content')
<form method="POST" action="{{ route('password.email') }}">
  @csrf
  <input type="email" name="email" placeholder="Masukkan email Anda" required>
  <button type="submit">Kirim Tautan Reset</button>
</form>
<a href="{{ route('login') }}">Kembali ke Halaman Login</a>
@endsection
