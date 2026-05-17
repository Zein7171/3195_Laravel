<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; // Tambahkan import Request jika belum ada

class DashboardController extends Controller
{
    // Tambahkan parameter Request $request di dalam index()
    public function index(Request $request)
    {
        return view('admin.dashboard');
    }
}