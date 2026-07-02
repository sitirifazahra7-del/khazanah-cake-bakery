@extends('layouts.app')
@section('title', 'Daftar - Khazanah Cake & Bakery')
@section('content')
<div class="min-h-screen flex items-center justify-center pt-20 pb-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 auth-card p-8">
        <div>
            <h2 class="text-center text-3xl font-extrabold text-[#d4af37]" style="font-family:'Cormorant Garamond',serif;">
                Daftar Akun Baru
            </h2>
            <p class="mt-2 text-center text-sm text-[#f7e080]/60">
                Sudah punya akun? <a href="{{ route('login') }}" class="font-medium text-[#d4af37] hover:text-[#e4b820]">Masuk di sini</a>
            </p>
        </div>
        <form class="mt-8 space-y-6" action="{{ route('register') }}" method="POST">
            @csrf

            @if($errors->any())
            <div class="bg-red-500/10 border border-red-500/30 p-4 rounded-xl">
                <ul class="text-sm text-red-400 space-y-1">
                    @foreach($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="rounded-md space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-[#f7e080]/80 mb-1">Nama Lengkap</label>
                    <input id="name" name="name" type="text" autocomplete="name" required class="input-gold" placeholder="Nama Anda" value="{{ old('name') }}">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-[#f7e080]/80 mb-1">Email address</label>
                    <input id="email" name="email" type="email" autocomplete="email" required class="input-gold" placeholder="email@contoh.com" value="{{ old('email') }}">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-[#f7e080]/80 mb-1">Password</label>
                    <input id="password" name="password" type="password" autocomplete="new-password" required class="input-gold" placeholder="Minimal 8 karakter">
                </div>
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-[#f7e080]/80 mb-1">Konfirmasi Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required class="input-gold" placeholder="Ulangi password">
                </div>
            </div>

            <div>
                <button type="submit" class="w-full btn-gold">
                    <span>Daftar Sekarang</span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
