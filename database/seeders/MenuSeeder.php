<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        // Header Menus
        $tentang = Menu::create(['name' => 'Tentang Desa', 'url' => '#', 'location' => 'header', 'order' => 1]);
        Menu::create(['name' => 'Sejarah', 'url' => '/tentang/sejarah', 'location' => 'header', 'parent_id' => $tentang->id, 'order' => 1]);
        Menu::create(['name' => 'Wilayah', 'url' => '/tentang/wilayah', 'location' => 'header', 'parent_id' => $tentang->id, 'order' => 2]);
        Menu::create(['name' => 'Demografi', 'url' => '/tentang/demografi', 'location' => 'header', 'parent_id' => $tentang->id, 'order' => 3]);
        Menu::create(['name' => 'Potensi', 'url' => '/tentang/potensi', 'location' => 'header', 'parent_id' => $tentang->id, 'order' => 4]);

        $lembaga = Menu::create(['name' => 'Lembaga', 'url' => '#', 'location' => 'header', 'order' => 2]);
        Menu::create(['name' => 'Pemerintahan', 'url' => '#', 'location' => 'header', 'parent_id' => $lembaga->id, 'order' => 1]);
        Menu::create(['name' => 'BPD', 'url' => '#', 'location' => 'header', 'parent_id' => $lembaga->id, 'order' => 2]);

        Menu::create(['name' => 'Kabar Desa', 'url' => '/kabar', 'location' => 'header', 'order' => 3]);
        Menu::create(['name' => 'Galeri', 'url' => '/galeri', 'location' => 'header', 'order' => 4]);

        // Footer 1 - Desa Anti Korupsi
        Menu::create(['name' => 'Tujuan dan Sasaran', 'url' => '#', 'location' => 'footer_1', 'order' => 1]);
        Menu::create(['name' => 'Visi & Misi', 'url' => '/tentang', 'location' => 'footer_1', 'order' => 2]);

        // Footer 2 - PPID
        Menu::create(['name' => 'Visi Misi PPID', 'url' => '#', 'location' => 'footer_2', 'order' => 1]);
        Menu::create(['name' => 'SOP PPID', 'url' => '#', 'location' => 'footer_2', 'order' => 2]);

        // Footer 3 - Program / Link
        Menu::create(['name' => 'Kampung KB', 'url' => '#', 'location' => 'footer_3', 'order' => 1]);
        Menu::create(['name' => 'Prodeskel', 'url' => '#', 'location' => 'footer_3', 'order' => 2]);
    }
}
