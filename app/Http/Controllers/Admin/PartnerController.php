<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner; // Mengimport Eloquent Model Partner
use Illuminate\Http\Request; // Mengimport Request

class PartnerController extends Controller
{
    // Tambahkan parameter Request $request di dalam kurung index
    public function index(Request $request)
    {
        // Mengambil semua data dari tabel partners menggunakan Eloquent
        $partners = Partner::all();

        // Melempar data tersebut ke file View blade admin/partners/index
        return view('admin.partners.index', compact('partners'));
    }
}