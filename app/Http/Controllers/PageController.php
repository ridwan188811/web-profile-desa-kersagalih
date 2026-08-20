<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function beranda()
    {
        $recent_posts = \App\Models\Post::with('category')
            ->where('status', 'published')
            ->latest()
            ->take(3)
            ->get();
            
        $recent_photos = \App\Models\Photo::latest()->take(4)->get();
        $kades = \App\Models\Personil::where('position', 'Kepala Desa')->where('is_active', true)->first();
        $pemerintahan_personils = \App\Models\Personil::where('category', 'Pemerintahan')
            ->where('is_active', true)
            ->orderBy('order')
            ->get();
            
        $potensis = \App\Models\Potensi::where('is_active', true)->latest()->take(3)->get();
        $wisatas = \App\Models\Wisata::where('is_active', true)->latest()->take(3)->get();
            
        return view('home', compact('recent_posts', 'recent_photos', 'kades', 'pemerintahan_personils', 'potensis', 'wisatas'))->with('title', 'Beranda - Desa Kersagalih');
    }

    public function wisata()
    {
        $wisatas = \App\Models\Wisata::where('is_active', true)->latest()->get();
        return view('wisata', compact('wisatas'))->with('title', 'Wisata Desa - Desa Kersagalih');
    }

    public function kabar()
    {
        $featured_posts = \App\Models\Post::with('category')
            ->where('status', 'published')
            ->latest()
            ->take(5)
            ->get();

        $posts = \App\Models\Post::with('category')
            ->where('status', 'published')
            ->latest()
            ->paginate(9);
            
        return view('kabar', compact('featured_posts', 'posts'))->with('title', 'Kabar Desa - Desa Kersagalih');
    }
    
    public function kabarShow($slug)
    {
        $post = \App\Models\Post::with(['category', 'user'])
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();
            
        // Increment views
        $post->increment('views');
        
        return view('kabar_show', compact('post'))->with('title', $post->title . ' - Desa Kersagalih');
    }

    public function tentang()
    {
        return view('tentang', ['title' => 'Tentang Desa - Desa Kersagalih']);
    }

    public function sejarah()
    {
        return view('sejarah', ['title' => 'Sejarah Desa - Desa Kersagalih']);
    }

    public function wilayah()
    {
        return view('wilayah', ['title' => 'Wilayah & Geografis - Desa Kersagalih']);
    }

    public function demografi()
    {
        return view('demografi', ['title' => 'Demografi & Kependudukan - Desa Kersagalih']);
    }

    public function potensi()
    {
        $potensis = \App\Models\Potensi::where('is_active', true)->latest()->get();
        return view('potensi', compact('potensis'))->with('title', 'Potensi Desa - Desa Kersagalih');
    }

    public function pembangunan()
    {
        return view('pembangunan', ['title' => 'Data Pembangunan - Desa Kersagalih']);
    }

    public function lembaga(Request $request)
    {
        $query = \App\Models\Personil::where('is_active', true)->orderBy('order');
        
        if ($request->has('kategori')) {
            $query->where('category', $request->kategori);
        }

        $personilGroups = $query->get()->groupBy('category');
        $kategoriAktif = $request->kategori ?? 'Semua Lembaga';
        
        $bagans = \App\Models\Setting::where('key', 'like', 'bagan_%')->get()->pluck('value', 'key')->toArray();
            
        return view('lembaga', compact('personilGroups', 'kategoriAktif', 'bagans'))->with('title', 'Lembaga Desa - Desa Kersagalih');
    }

    public function galeri()
    {
        $albums = \App\Models\Album::where('is_active', true)
            ->with(['photos' => function ($query) {
                $query->latest();
            }])
            ->latest()
            ->get();
            
        return view('galeri', compact('albums'))->with('title', 'Galeri Desa - Desa Kersagalih');
    }
}
