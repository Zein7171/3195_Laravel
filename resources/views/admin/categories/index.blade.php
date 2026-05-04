@extends('layouts.admin')

@section('content')
    <header class="flex justify-between items-center mb-12">
        <div>
            <h1 class="text-4xl font-bold text-slate-900 dark:text-white">Kelola Kategori</h1>
            <p class="text-slate-500 dark:text-slate-400 font-regular mt-2">Atur dan kelola semua kategori event</p>
        </div>
        <button
            class="px-6 py-3 bg-slate-900 hover:bg-slate-800 text-white rounded-xl font-semibold shadow-lg transition-all active:scale-95">
            + Tambah Kategori
        </button>
    </header>

    <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-700 shadow-sm overflow-hidden">
        <div class="px-8 py-6 bg-slate-50 dark:bg-slate-800 border-b border-slate-200 dark:border-slate-700 flex gap-4">
            <input type="text" placeholder="Cari nama kategori..."
                class="flex-1 px-5 py-3 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-900 dark:text-white placeholder-slate-500 dark:placeholder-slate-400 focus:ring-2 focus:ring-slate-900 dark:focus:ring-slate-500 outline-none transition">
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 text-xs font-bold tracking-wide">
                    <tr>
                        <th class=\"px-8 py-5 w-16\">No</th>
                        <th class=\"px-8 py-5\">Kategori</th>
                        <th class=\"px-8 py-5\">Deskripsi</th>
                        <th class=\"px-8 py-5\">Jumlah Event</th>
                        <th class=\"px-8 py-5\">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800 transition">
                        <td class="px-8 py-5 font-semibold text-slate-500 dark:text-slate-400">1</td>
                        <td class="px-8 py-5">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-red-100 dark:bg-red-900/30 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-red-600 dark:text-red-400" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M11.99 5V1h-1v4H7.58L5.6 4.04 4.95 4.6 9 9.07l1.06-1.06c.03-.03.06-.06.07-.1l2.86-2.87zM12 18h-1v4h1v-4zm4.42-2h4H20v-1h-3.58l2-2.04.65-.56-4.05-4.07-1.06 1.06c-.03.03-.06.06-.07.1l-2.86 2.87 1.06 1.06 2.78.58z">
                                        </path>
                                    </svg>
                                </div>
                                <span class="font-semibold text-slate-900 dark:text-white">Musik</span>
                            </div>
                        </td>
                        <td class="px-8 py-5 text-slate-600 dark:text-slate-300 text-sm">Acara musik live, konser, dan festival</td>
                        <td class="px-8 py-5">
                            <span class="px-3 py-1 bg-red-100 dark:bg-red-900/20 text-red-700 dark:text-red-300 rounded-lg text-xs font-semibold">8 Event</span>
                        </td>
                        <td class="px-8 py-5">
                            <div class="flex gap-2">
                                <button
                                    class="p-2 bg-slate-200 dark:bg-slate-700 text-slate-700 dark:text-slate-300 rounded-lg hover:bg-slate-900 dark:hover:bg-slate-600 hover:text-white transition"
                                    title="Edit">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 00-2 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                        </path>
                                    </svg>
                                </button>
                                <button
                                    class="p-2 bg-slate-200 dark:bg-slate-700 text-slate-700 dark:text-slate-300 rounded-lg hover:bg-red-600 hover:text-white transition"
                                    title="Hapus">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800 transition">
                        <td class="px-8 py-5 font-semibold text-slate-500 dark:text-slate-400">2</td>
                        <td class="px-8 py-5">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M20 13H4c-.55 0-1 .45-1 1v6c0 .55.45 1 1 1h16c.55 0 1-.45 1-1v-6c0-.55-.45-1-1-1zm-1 6H5v-4h14v4zM7 17h2v2H7zm4 0h2v2h-2zm4 0h2v2h-2zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11z">
                                        </path>
                                    </svg>
                                </div>
                                <span class="font-semibold text-slate-900 dark:text-white">Seminar</span>
                            </div>
                        </td>
                        <td class="px-8 py-5 text-slate-600 dark:text-slate-300 text-sm">Acara edukatif dan pembelajaran</td>
                        <td class="px-8 py-5">
                            <span class="px-3 py-1 bg-blue-100 dark:bg-blue-900/20 text-blue-700 dark:text-blue-300 rounded-lg text-xs font-semibold">5 Event</span>
                        </td>
                        <td class="px-8 py-5">
                            <div class="flex gap-2">
                                <button
                                    class="p-2 bg-slate-200 dark:bg-slate-700 text-slate-700 dark:text-slate-300 rounded-lg hover:bg-slate-900 dark:hover:bg-slate-600 hover:text-white transition"
                                    title="Edit">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 00-2 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                        </path>
                                    </svg>
                                </button>
                                <button
                                    class="p-2 bg-slate-200 dark:bg-slate-700 text-slate-700 dark:text-slate-300 rounded-lg hover:bg-red-600 hover:text-white transition"
                                    title="Hapus">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800 transition">
                        <td class="px-8 py-5 font-semibold text-slate-500 dark:text-slate-400">3</td>
                        <td class="px-8 py-5">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-purple-100 dark:bg-purple-900/30 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-purple-600 dark:text-purple-400" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M11.99 5V1h-1v4H7.58L5.6 4.04 4.95 4.6 9 9.07l1.06-1.06c.03-.03.06-.06.07-.1l2.86-2.87zM12 18h-1v4h1v-4zm4.42-2h4H20v-1h-3.58l2-2.04.65-.56-4.05-4.07-1.06 1.06c-.03.03-.06.06-.07.1l-2.86 2.87 1.06 1.06 2.78.58z">
                                        </path>
                                    </svg>
                                </div>
                                <span class="font-semibold text-slate-900 dark:text-white">Workshop</span>
                            </div>
                        </td>
                        <td class="px-8 py-5 text-slate-600 dark:text-slate-300 text-sm">Pelatihan dan workshop interaktif</td>
                        <td class="px-8 py-5">
                            <span class="px-3 py-1 bg-purple-100 dark:bg-purple-900/20 text-purple-700 dark:text-purple-300 rounded-lg text-xs font-semibold">3 Event</span>
                        </td>
                        <td class="px-8 py-5">
                            <div class="flex gap-2">
                                <button
                                    class="p-2 bg-slate-200 dark:bg-slate-700 text-slate-700 dark:text-slate-300 rounded-lg hover:bg-slate-900 dark:hover:bg-slate-600 hover:text-white transition"
                                    title="Edit">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 00-2 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                        </path>
                                    </svg>
                                </button>
                                <button
                                    class="p-2 bg-slate-200 dark:bg-slate-700 text-slate-700 dark:text-slate-300 rounded-lg hover:bg-red-600 hover:text-white transition"
                                    title="Hapus">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection