@extends('layouts.admin')

@section('content')
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-50 dark:bg-green-900/30 border border-green-200 dark:border-green-800 text-green-800 dark:text-green-400 rounded-xl font-medium text-sm flex items-center gap-2">
            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            {{ session('success') }}
        </div>
    @endif

    <header class="flex justify-between items-center mb-12">
        <div>
            <h1 class="text-4xl font-bold text-slate-900 dark:text-white">Kelola Partner</h1>
            <p class="text-slate-500 dark:text-slate-400 font-regular mt-2">Kelola dan atur semua mitra/partner kerja sama Anda di sini</p>
        </div>
        <a href="{{ route('admin.partners.create') }}"
           class="px-6 py-3 bg-slate-900 hover:bg-slate-800 text-white rounded-xl font-semibold shadow-lg transition-all active:scale-95 flex items-center">
           + Tambah Partner
        </a>
    </header>

    <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-700 shadow-sm overflow-hidden">
        
        <div class="px-8 py-6 bg-slate-50 dark:bg-slate-800 border-b border-slate-200 dark:border-slate-700">
            <form action="{{ route('admin.partners.index') }}" method="GET" class="flex gap-4">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama partner... (Lalu tekan Enter)"
                    class="flex-1 px-5 py-3 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-900 dark:text-white placeholder-slate-500 dark:placeholder-slate-400 focus:ring-2 focus:ring-slate-900 dark:focus:ring-slate-500 outline-none transition">
                
                @if(request('search'))
                    <a href="{{ route('admin.partners.index') }}" class="px-5 py-3 bg-slate-200 hover:bg-slate-300 text-slate-700 font-semibold rounded-lg transition flex items-center">
                        Reset
                    </a>
                @endif
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 text-xs font-bold tracking-wide">
                    <tr>
                        <th class="px-8 py-5 w-16">No</th>
                        <th class="px-8 py-5">Logo</th>
                        <th class="px-8 py-5">Nama Partner</th>
                        <th class="px-8 py-5">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                    @forelse ($partners as $index => $partner)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800 transition">
                            <td class="px-8 py-5 font-semibold text-slate-500 dark:text-slate-400">
                                {{ $index + 1 }}
                            </td>
                            <td class="px-8 py-5">
                                <img src="{{ $partner->logo_url }}" class="w-14 h-14 rounded-lg object-cover shadow-sm border border-slate-200 dark:border-slate-700" alt="Logo">
                            </td>
                            <td class="px-8 py-5">
                                <p class="font-bold text-slate-900 dark:text-white text-sm">{{ $partner->name }}</p>
                                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">ID Partner: #{{ $partner->id }}</p>
                            </td>
                            <td class="px-8 py-5">
                                <div class="flex gap-2 items-center">
                                    <a href="{{ route('admin.partners.edit', $partner->id) }}" title="Edit"
                                        class="p-2 bg-slate-200 dark:bg-slate-700 text-slate-700 dark:text-slate-300 rounded-lg hover:bg-slate-900 dark:hover:bg-slate-600 hover:text-white transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 00-2 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                            </path>
                                        </svg>
                                    </a>

                                    <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus partner ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" title="Hapus"
                                            class="p-2 bg-slate-200 dark:bg-slate-700 text-slate-700 dark:text-slate-300 rounded-lg hover:bg-red-600 hover:text-white transition">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-8 py-10 text-center text-slate-400 dark:text-slate-500 text-sm font-medium">
                                Belum ada data partner yang cocok atau tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection