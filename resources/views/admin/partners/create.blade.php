@extends('layouts.admin')

@section('content')
    <header class="flex justify-between items-center mb-12">
        <div>
            <h1 class="text-4xl font-bold text-slate-900 dark:text-white">Tambah Partner Baru</h1>
            <p class="text-slate-500 dark:text-slate-400 font-regular mt-2">Tambahkan mitra atau partner kerja sama baru ke dalam sistem</p>
        </div>
        <a href="{{ route('admin.partners.index') }}"
            class="px-6 py-3 bg-slate-200 hover:bg-slate-300 text-slate-700 rounded-xl font-semibold transition-all active:scale-95">
            ← Kembali
        </a>
    </header>

    <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-700 shadow-sm overflow-hidden p-8">
        <form action="{{ route('admin.partners.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="name" class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Nama Partner</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Masukkan nama instansi/perusahaan partner"
                    class="w-full px-5 py-3 rounded-lg border @error('name') border-red-500 @else border-slate-300 dark:border-slate-600 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white placeholder-slate-500 dark:placeholder-slate-400 focus:ring-2 focus:ring-slate-900 dark:focus:ring-slate-500 outline-none transition">
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="logo_url" class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">URL Logo Partner</label>
                <input type="text" id="logo_url" name="logo_url" value="{{ old('logo_url', 'https://placehold.co/200x200') }}" placeholder="Contoh: https://placehold.co/200x200"
                    class="w-full px-5 py-3 rounded-lg border @error('logo_url') border-red-500 @else border-slate-300 dark:border-slate-600 @enderror bg-white dark:bg-slate-700 text-slate-900 dark:text-white placeholder-slate-500 dark:placeholder-slate-400 focus:ring-2 focus:ring-slate-900 dark:focus:ring-slate-500 outline-none transition">
                @error('logo_url')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end pt-4">
                <button type="submit"
                    class="px-6 py-3 bg-slate-900 hover:bg-slate-800 text-white rounded-xl font-semibold shadow-lg transition-all active:scale-95">
                    Simpan Data Partner
                </button>
            </div>
        </form>
    </div>
@endsection