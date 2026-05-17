<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function index(Request $request)
    {
        $categories = Category::all();
        
        // Logika menangkap filter query ?category=slug
        $events = Event::with('category');

        if ($request->has('category') && $request->category != '') {
            $events->whereHas('category', function($query) use ($request) {
                $query->where('slug', $request->category);
            });
        }

        $events = $events->get();

        return view('welcome', compact('categories', 'events'));
    }
}