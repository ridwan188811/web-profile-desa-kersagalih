<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Show the admin dashboard.
     */
    public function dashboard()
    {
        $stats = [
            'total_berita' => \App\Models\Post::count(),
            'total_personil' => \App\Models\Personil::count(),
            'total_album' => \App\Models\Album::count(),
            'total_potensi' => \App\Models\Potensi::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
