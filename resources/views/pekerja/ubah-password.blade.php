@extends('layouts.auth')
@section('title', 'Ubah Kata Sandi')

@section('content')
@if(session('success'))
  <p style="color: green; font-size: 14px; margin-bottom: 10px;">{{ session('success') }}</p>
@endif

@if($errors->any())
  <p style="color: red; font-size: 14px; margin-bottom: 10px;">{{ $errors->first() }}</p>
@endif

<form method="POST" action="{{ route('pekerja.updatePassword') }}">
  @csrf
  <input type="password" name="current_password" placeholder="Kata Sandi Lama" required>
  <input type="password" name="new_password" placeholder="Kata Sandi Baru" required>
  <input type="password" name="new_password_confirmation" placeholder="Konfirmasi Kata Sandi Baru" required>
  <button type="submit">Simpan Perubahan</button>
</form>
@endsection
