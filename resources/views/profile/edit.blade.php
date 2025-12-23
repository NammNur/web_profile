@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('asset/css/profile.css') }}">

<div class="container py-5">
    <h3 class="page-title">Profil Saya</h3>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <div class="profile-card">
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf

            <!-- NAMA -->
            <div class="profile-field">
                <label class="form-label">Nama</label>
                <div class="field-row">
                    <span class="field-text">{{ $user->nama }}</span>
                    <button type="button" class="btn-edit">✏️</button>
                </div>
                <input type="text" name="nama" class="form-control field-input" value="{{ $user->nama }}">
            </div>

            <!-- USERNAME -->
            <div class="profile-field">
                <label class="form-label">Username</label>
                <div class="field-row">
                    <span class="field-text">{{ $user->username }}</span>
                    <button type="button" class="btn-edit">✏️</button>
                </div>
                <input type="text" name="username" class="form-control field-input" value="{{ $user->username }}">
            </div>

            <!-- EMAIL -->
            <div class="profile-field">
                <label class="form-label">Email</label>
                <div class="field-row">
                    <span class="field-text">{{ $user->email }}</span>
                    <button type="button" class="btn-edit">✏️</button>
                </div>
                <input type="email" name="email" class="form-control field-input" value="{{ $user->email }}">
            </div>

            <!-- WHATSAPP -->
            <div class="profile-field">
                <label class="form-label">No WhatsApp</label>
                <div class="field-row">
                    <span class="field-text">{{ $user->telepon }}</span>
                    <button type="button" class="btn-edit">✏️</button>
                </div>
                <input type="text" name="telepon" class="form-control field-input" value="{{ $user->telepon }}">
            </div>

            <!-- PASSWORD -->
            <div class="profile-field">
                <label class="form-label">Password</label>
                <div class="field-row">
                    <span class="field-text">********</span>
                    <button type="button" class="btn-edit">✏️</button>
                </div>
                <input type="password" name="password" class="form-control field-input" placeholder="Password baru">
                <input type="password" name="password_confirmation" class="form-control field-input mt-2" placeholder="Konfirmasi password">
            </div>

            <button type="submit" class="btn-save">Simpan Perubahan</button>
        </form>
    </div>
</div>

{{-- JS FIX --}}
<script>
document.querySelectorAll('.btn-edit').forEach(button => {
    button.addEventListener('click', function () {
        const field = this.closest('.profile-field');
        const row = field.querySelector('.field-row');
        const inputs = field.querySelectorAll('.field-input');

        row.style.display = 'none';
        inputs.forEach(input => {
            input.style.display = 'block';
            input.focus();
        });
    });
});
</script>
@endsection
