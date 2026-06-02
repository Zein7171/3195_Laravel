@extends('layouts.app')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center px-6 py-12 bg-slate-50">
    <div class="w-full max-w-md bg-white rounded-3xl border border-slate-100 shadow-xl p-8 space-y-6">
        
        <div class="text-center space-y-2">
            <h1 class="text-3xl font-extrabold tracking-tight text-slate-900">
                Selamat Datang
            </h1>
            <p class="text-sm font-medium text-slate-500">
                Silakan masuk untuk mengelola AmikomEventHub
            </p>
        </div>

        <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-5">
            @csrf

            <div class="space-y-2">
                <label for="email" class="text-sm font-bold text-slate-700 block">
                    Alamat Email
                </label>
                <div class="relative">
                    <input type="email" id="email" name="email" required autofocus
                        class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:border-indigo-600 focus:bg-white text-slate-900 placeholder-slate-400 font-medium transition text-sm"
                        placeholder="contoh: admin@amikom.ac.id"
                        value="{{ old('email') }}"> </div>
                @error('email')
                    <span class="text-xs font-semibold text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="space-y-2">
                <label for="password" class="text-sm font-bold text-slate-700 block">
                    Kata Sandi (Password)
                </label>
                <div class="relative">
                    <input type="password" id="password" name="password" required
                        class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:border-indigo-600 focus:bg-white text-slate-900 placeholder-slate-400 font-medium transition text-sm"
                        placeholder="••••••••">
                </div>
                @error('password')
                    <span class="text-xs font-semibold text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center justify-between pt-1">
                <div class="flex items-center gap-2">
                    <input type="checkbox" id="remember" name="remember" 
                        class="w-4 h-4 rounded text-indigo-600 focus:ring-indigo-500 border-slate-300">
                    <label for="remember" class="text-xs text-slate-500 font-semibold select-none cursor-pointer">
                        Ingat Saya
                    </label>
                </div>
            </div>

            <button type="submit" 
                class="w-full py-4 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-bold text-md shadow-lg shadow-indigo-100 transition-all duration-300 transform active:scale-[0.98]">
                Masuk Sekarang
            </button>
        </form>

    </div>
</div>
@endsection