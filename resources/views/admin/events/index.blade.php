@extends('layouts.admin')

@section('content')
    <header class="flex justify-between items-center mb-12">
        <div>
            <h1 class="text-4xl font-bold text-slate-900 dark:text-white">Kelola Event</h1>
            <p class="text-slate-500 dark:text-slate-400 font-regular mt-2">Kelola dan atur semua acara Anda di sini</p>
        </div>
        <!-- Tombol Tambah Event diarahkan ke route create -->
        <a href="{{ route('admin.events.create') }}"
            class="px-6 py-3 bg-slate-900 hover:bg-slate-800 text-white rounded-xl font-semibold shadow-lg transition-all active:scale-95">
            + Tambah Event
        </a>
    </header>

    <!-- Notifikasi Sukses -->
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 border border-green-200 text-green-700 rounded-xl">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-700 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 text-xs font-bold tracking-wide">
                    <tr>
                        <th class="px-8 py-5 w-16">No</th>
                        <th class="px-8 py-5">Event</th>
                        <th class="px-8 py-5">Kategori</th>
                        <th class="px-8 py-5">Harga / Stok</th>
                        <th class="px-8 py-5 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                    <!-- Perulangan data dari Database -->
                    @forelse($events as $index => $event)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800 transition">
                            <td class="px-8 py-5 font-semibold text-slate-500 dark:text-slate-400">
                                {{ $events->firstItem() + $index }}
                            </td>
                            <td class="px-8 py-5">
                                <p class="font-bold text-slate-900 dark:text-white text-sm">{{ $event->title }}</p>
                                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">
                                    {{ \Carbon\Carbon::parse($event->date)->format('d M Y, H:i') }}[cite: 1]
                                </p>
                            </td>
                            <td class="px-8 py-5">
                                <span class="px-3 py-1 bg-indigo-50 text-indigo-600 rounded-full text-xs font-semibold uppercase">
                                    {{ $event->category->name ?? '-' }}[cite: 1]
                                </span>
                            </td>
                            <td class="px-8 py-5">
                                <p class="font-semibold text-slate-900 dark:text-white text-sm">Rp {{ number_format($event->price, 0, ',', '.') }}[cite: 1]</p>
                                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Stok: {{ $event->stock }}[cite: 1]</p>
                            </td>
                            <td class="px-8 py-5">
                                <div class="flex justify-center gap-3">
                                    <!-- Tombol Edit[cite: 1] -->
                                    <a href="{{ route('admin.events.edit', $event->id) }}" title="Edit"
                                        class="p-2 bg-slate-100 dark:bg-slate-700 text-slate-700 dark:text-slate-300 rounded-lg hover:bg-slate-900 dark:hover:bg-slate-600 hover:text-white transition">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 00-2 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </a>

                                    <!-- Form Hapus dengan Konfirmasi[cite: 1] -->
                                    <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" 
                                          onsubmit="return confirm('Yakin ingin menghapus event ini secara permanen?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" title="Hapus"
                                            class="p-2 bg-slate-100 dark:bg-slate-700 text-red-500 rounded-lg hover:bg-red-600 hover:text-white transition">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-8 py-10 text-center text-slate-500">Belum ada data event.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Paginasi[cite: 1] -->
        <div class="px-8 py-4 bg-slate-50 dark:bg-slate-800 border-t border-slate-200 dark:border-slate-700">
            {{ $events->links() }}
        </div>
    </div>
@endsection