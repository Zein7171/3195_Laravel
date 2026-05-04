@extends('layouts.admin')

@section('content')
    <header class="flex justify-between items-center mb-12">
        <div>
            <h1 class="text-4xl font-bold text-slate-900 dark:text-white">Laporan Transaksi</h1>
            <p class="text-slate-500 dark:text-slate-400 font-regular mt-2">Pantau arus kas dan penjualan tiket</p>
        </div>
        <div class="flex gap-3">
            <button
                class="px-6 py-3 border border-slate-300 dark:border-slate-600 text-slate-900 dark:text-white rounded-xl font-semibold hover:bg-slate-50 dark:hover:bg-slate-800 transition">
                Ekspor Excel
            </button>
            <button
                class="px-6 py-3 bg-slate-900 hover:bg-slate-800 text-white rounded-xl font-semibold transition-all active:scale-95">
                Unduh PDF
            </button>
        </div>
    </header>

    <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-700 shadow-sm overflow-hidden">
        <div class="px-8 py-6 bg-slate-50 dark:bg-slate-800 border-b border-slate-200 dark:border-slate-700 flex flex-wrap gap-4 items-center">
            <div class="flex-1 min-w-[300px] flex gap-2">
                <input type="text" placeholder="Cari Order ID, Nama, atau Email..."
                    class="flex-1 px-5 py-3 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-900 dark:text-white placeholder-slate-500 dark:placeholder-slate-400 focus:ring-2 focus:ring-slate-900 dark:focus:ring-slate-500 outline-none transition text-sm font-medium">
            </div>
            <div class="flex gap-2">
                <select
                    class="px-5 py-3 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-900 dark:text-white outline-none text-sm font-semibold">
                    <option>Semua Status</option>
                    <option>Success</option>
                    <option>Pending</option>
                    <option>Expired</option>
                </select>
                <select
                    class="px-5 py-3 rounded-lg border border-slate-300 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-900 dark:text-white outline-none text-sm font-semibold">
                    <option>Bulan Ini</option>
                    <option>Bulan Lalu</option>
                    <option>Tahun 2024</option>
                </select>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 text-xs font-bold tracking-wide">
                    <tr>
                        <th class="px-8 py-5">Order ID</th>
                        <th class="px-8 py-5">Detail Pembeli</th>
                        <th class="px-8 py-5">Event</th>
                        <th class="px-8 py-5">Tgl Transaksi</th>
                        <th class="px-8 py-5">Status</th>
                        <th class="px-8 py-5 text-right">Total Tagihan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800 transition">
                        <td class="px-8 py-5">
                            <span
                                class="font-mono font-semibold text-slate-900 dark:text-white bg-slate-100 dark:bg-slate-800 px-3 py-1 rounded-lg text-xs">#TRX-99210</span>
                            </td>
                            <td class="px-8 py-5">
                                <p class="font-semibold text-slate-900 dark:text-white text-sm">Donni Prabowo</p>
                                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">donni@example.com</p>
                            </td>
                            <td class="px-8 py-5">
                                <p class="font-medium text-slate-900 dark:text-white text-sm">Jazz Night 2024</p>
                            </td>
                            <td class="px-8 py-5 text-xs text-slate-600 dark:text-slate-400">
                                26 Mar 2024, 17:45
                            </td>
                            <td class="px-8 py-5">
                                <span
                                    class="px-3 py-1 bg-green-100 dark:bg-green-900/20 text-green-700 dark:text-green-300 rounded-lg text-xs font-semibold">Success</span>
                            </td>
                            <td class="px-8 py-5 text-right font-bold text-slate-900 dark:text-white">
                                Rp 155.000
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800 transition">
                            <td class="px-8 py-5">
                                <span
                                    class="font-mono font-semibold text-slate-900 dark:text-white bg-slate-100 dark:bg-slate-800 px-3 py-1 rounded-lg text-xs">#TRX-99209</span>
                            </td>
                            <td class="px-8 py-5">
                                <p class="font-semibold text-slate-900 dark:text-white text-sm">Maya Sari</p>
                                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">maya@example.com</p>
                            </td>
                            <td class="px-8 py-5">
                                <p class="font-medium text-slate-900 dark:text-white text-sm">AI & Future Workshop</p>
                            </td>
                            <td class="px-8 py-5 text-xs text-slate-600 dark:text-slate-400">
                                26 Mar 2024, 15:20
                            </td>
                            <td class="px-8 py-5">
                                <span
                                    class="px-3 py-1 bg-orange-100 dark:bg-orange-900/20 text-orange-700 dark:text-orange-300 rounded-lg text-xs font-semibold">Pending</span>
                            </td>
                            <td class="px-8 py-5 text-right font-bold text-slate-900 dark:text-white">
                                Rp 55.000
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800 transition">
                            <td class="px-8 py-5">
                                <span
                                    class="font-mono font-semibold text-slate-900 dark:text-white bg-slate-100 dark:bg-slate-800 px-3 py-1 rounded-lg text-xs">#TRX-99208</span>
                            </td>
                            <td class="px-8 py-5">
                                <p class="font-semibold text-slate-900 dark:text-white text-sm">Budi Santoso</p>
                                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">budi@example.com</p>
                            </td>
                            <td class="px-8 py-5">
                                <p class="font-medium text-slate-900 dark:text-white text-sm">Hackathon 2024</p>
                            </td>
                            <td class="px-8 py-5 text-xs text-slate-600 dark:text-slate-400">
                                25 Mar 2024, 10:00
                            </td>
                            <td class="px-8 py-5">
                                <span
                                    class="px-3 py-1 bg-slate-200 dark:bg-slate-700 text-slate-700 dark:text-slate-300 rounded-lg text-xs font-semibold">Free</span>
                            </td>
                            <td class="px-8 py-5 text-right font-bold text-slate-900 dark:text-white">
                                Rp 0
                            </td>
                        </tr>
                        <!-- More rows... -->
                    </tbody>
                </table>
            </div>

            <div class="px-8 py-6 bg-slate-50 dark:bg-slate-800 border-t border-slate-200 dark:border-slate-700 flex justify-between items-center">
                <p class="text-sm text-slate-600 dark:text-slate-400 font-medium">Menampilkan 3 dari 124 transaksi</p>
                <div class="flex gap-2">
                    <button
                        class="px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-700 text-slate-600 dark:text-slate-300 transition text-sm font-semibold opacity-50 cursor-not-allowed">Previous</button>
                    <button class="px-4 py-2 bg-slate-900 dark:bg-slate-700 text-white dark:text-slate-100 rounded-lg text-sm font-semibold">1</button>
                    <button class="px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-700 text-slate-600 dark:text-slate-300 transition text-sm font-semibold">2</button>
                    <button
                        class="px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-700 text-slate-600 dark:text-slate-300 transition text-sm font-semibold">Next</button>
                </div>
            </div>
        </div>
@endsection