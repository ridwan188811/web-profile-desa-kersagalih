<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Page;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Beranda
        $beranda = Page::create([
            'title' => 'Beranda',
            'slug' => 'beranda',
            'meta_description' => 'Website Resmi Desa Kersagalih',
        ]);
        $beranda->sections()->create([
            'section_key' => 'hero_title',
            'content' => 'Selamat Datang di Web Desa Kersagalih'
        ]);
        $beranda->sections()->create([
            'section_key' => 'hero_subtitle',
            'content' => 'Membangun Desa Bersama Masyarakat menuju Kersagalih yang Sejahtera dan Mandiri.'
        ]);

        // 2. Tentang (Visi Misi)
        $tentang = Page::create([
            'title' => 'Tentang Desa',
            'slug' => 'tentang',
            'meta_description' => 'Profil dan Visi Misi Desa Kersagalih',
        ]);
        $tentang->sections()->create([
            'section_key' => 'visi_misi',
            'content' => '<h3 style="color: var(--bg-dark-blue); margin-bottom: 1rem; font-size: 1.4rem;">Visi</h3><p style="font-size: 1.2rem; font-weight: 500; font-style: italic;">"Terwujudnya Desa Kersagalih yang Mandiri, Sejahtera, Religius, dan Berbudaya melalui Tata Kelola Pemerintahan yang Bersih dan Inovatif."</p><h3 style="color: var(--bg-dark-blue); margin-bottom: 1rem; font-size: 1.4rem; margin-top:2rem;">Misi</h3><ol style="padding-left: 1.5rem; line-height: 1.8;"><li>Meningkatkan kualitas pelayanan publik berbasis digital.</li><li>Mendorong pertumbuhan ekonomi kerakyatan melalui pemberdayaan UMKM.</li><li>Membangun infrastruktur desa yang memadai.</li></ol>'
        ]);
        $tentang->sections()->create([
            'section_key' => 'sejarah_singkat',
            'content' => '<p>Asal usul Desa Kersagalih menyimpan nilai historis yang kuat dari para pendahulu. Nama "Kersagalih" sendiri diambil dari filosofi Sunda yang bermakna "Kehendak Hati" atau "Niat yang Tulus", mencerminkan semangat warga dalam membangun desa dari awal berdirinya.</p>'
        ]);

        // 3. Sejarah Lengkap
        $sejarah = Page::create([
            'title' => 'Sejarah Desa',
            'slug' => 'sejarah',
        ]);
        $sejarah->sections()->create([
            'section_key' => 'narasi',
            'content' => '<p>Dahulu Desa Kersagalih bernama Desa Campaka yang berdiri kurang lebih pada abad ke-19.</p>'
        ]);
    }
}
