<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function index(\Illuminate\Http\Request $request)
    {
        return view('admin.transactions');
    }
}
