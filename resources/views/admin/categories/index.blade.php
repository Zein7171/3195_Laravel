@extends('layouts.admin')

@section('content')
    <header class="flex justify-between items-center mb-12">
        <div>
            <h1 class="text-4xl font-bold text-slate-900 dark:text-white">Kelola Kategori</h1>
            <p class="text-slate-500 dark:text-slate-400 font-regular mt-2">Atur dan kelola semua kategori event</p>
        </div>
        <button onclick="openModal('modalTambah')"
            class="px-6 py-3 bg-slate-900 hover:bg-slate-800 text-white rounded-xl font-semibold shadow-lg transition-all active:scale-95 text-sm">
            + Tambah Kategori
        </button>
    </header>

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 border border-green-200 text-green-700 rounded-xl text-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-700 shadow-sm overflow-hidden">
        
        <div class="px-8 py-6 bg-slate-50 dark:bg-slate-800 border-b border-slate-200 dark:border-slate-700">
            <form action="{{ route('admin.categories.index') }}" method="GET" class="flex gap-4">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama kategori... (Lalu tekan Enter)"
                    class="flex-1 px-5 py-3 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-900 dark:text-white placeholder-slate-500 dark:placeholder-slate-400 focus:ring-2 focus:ring-slate-900 dark:focus:ring-slate-500 outline-none transition">
                
                @if(request('search'))
                    <a href="{{ route('admin.categories.index') }}" class="px-5 py-3 bg-slate-200 hover:bg-slate-300 text-slate-700 font-semibold rounded-lg transition flex items-center">
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
                        <th class="px-8 py-5">Kategori</th>
                        <th class="px-8 py-5">Slug</th>
                        <th class="px-8 py-5">Jumlah Event</th>
                        <th class="px-8 py-5">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                    @forelse($categories as $category)
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800 transition">
                        <td class="px-8 py-5 font-semibold text-slate-500 dark:text-slate-400">{{ $loop->iteration }}</td>
                        <td class="px-8 py-5">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-slate-100 dark:bg-slate-800 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-slate-600 dark:text-slate-400" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M11.99 5V1h-1v4H7.58L5.6 4.04 4.95 4.6 9 9.07l1.06-1.06c.03-.03.06-.06.07-.1l2.86-2.87zM12 18h-1v4h1v-4zm4.42-2h4H20v-1h-3.58l2-2.04.65-.56-4.05-4.07-1.06 1.06c-.03.03-.06.06-.07.1l-2.86 2.87 1.06 1.06 2.78.58z"></path>
                                    </svg>
                                </div>
                                <span class="font-semibold text-slate-900 dark:text-white">{{ $category->name }}</span>
                            </div>
                        </td>
                        <td class="px-8 py-5 text-slate-600 dark:text-slate-300 text-sm">{{ $category->slug }}</td>
                        <td class="px-8 py-5">
                            <span class="px-3 py-1 bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 rounded-lg text-xs font-semibold">
                                {{ $category->events->count() }} Event
                            </span>
                        </td>
                        <td class="px-8 py-5">
                            <div class="flex gap-2">
                                <button onclick="openModal('modalEdit{{ $category->id }}')"
                                    class="p-2 bg-slate-200 dark:bg-slate-700 text-slate-700 dark:text-slate-300 rounded-lg hover:bg-slate-900 dark:hover:bg-slate-600 hover:text-white transition"
                                    title="Edit">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 00-2 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                        </path>
                                    </svg>
                                </button>
                                
                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="p-2 bg-slate-200 dark:bg-slate-700 text-slate-700 dark:text-slate-300 rounded-lg hover:bg-red-600 hover:text-white transition"
                                        title="Hapus">
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

                    <div id="modalEdit{{ $category->id }}" class="fixed inset-0 z-50 hidden bg-slate-900/50 backdrop-blur-sm flex items-center justify-center p-4">
                        <div class="bg-white dark:bg-slate-900 rounded-2xl max-w-md w-full p-6 shadow-xl border border-slate-200 dark:border-slate-700">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-xl font-bold text-slate-900 dark:text-white">Edit Kategori</h3>
                                <button type="button" onclick="closeModal('modalEdit{{ $category->id }}')" class="text-slate-400 hover:text-slate-600 text-2xl">&times;</button>
                            </div>
                            <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-5">
                                    <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Nama Kategori</label>
                                    <input type="text" name="name" value="{{ $category->name }}" class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-slate-900 dark:text-white focus:ring-2 focus:ring-slate-500 focus:outline-none" required>
                                </div>
                                <div class="flex justify-end gap-3">
                                    <button type="button" onclick="closeModal('modalEdit{{ $category->id }}')" class="px-4 py-2 text-sm font-semibold text-slate-500 hover:text-slate-700">Batal</button>
                                    <button type="submit" class="px-5 py-2 bg-slate-900 dark:bg-white dark:text-slate-900 text-white text-sm font-semibold rounded-xl shadow">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    @empty
                    <tr>
                        <td colspan="5" class="px-8 py-10 text-center text-slate-400 dark:text-slate-500">Belum ada data kategori yang cocok atau tersedia.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div id="modalTambah" class="fixed inset-0 z-50 hidden bg-slate-900/50 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white dark:bg-slate-900 rounded-2xl max-w-md w-full p-6 shadow-xl border border-slate-200 dark:border-slate-700">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-slate-900 dark:text-white">Tambah Kategori Baru</h3>
                <button type="button" onclick="closeModal('modalTambah')" class="text-slate-400 hover:text-slate-600 text-2xl">&times;</button>
            </div>
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Nama Kategori</label>
                    <input type="text" name="name" placeholder="Masukkan nama kategori..." class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl text-slate-900 dark:text-white focus:ring-2 focus:ring-slate-500 focus:outline-none" required>
                </div>
                <div class="flex justify-end gap-3">
                    <button type="button" onclick="closeModal('modalTambah')" class="px-4 py-2 text-sm font-semibold text-slate-500 hover:text-slate-700">Batal</button>
                    <button type="submit" class="px-5 py-2 bg-slate-900 dark:bg-white dark:text-slate-900 text-white text-sm font-semibold rounded-xl shadow">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal(id) {
            document.getElementById(id).classList.remove('hidden');
        }
        function closeModal(id) {
            document.getElementById(id).classList.add('hidden');
        }
    </script>
@endsection