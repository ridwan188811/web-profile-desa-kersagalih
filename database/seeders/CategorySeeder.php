<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Pemerintahan',
            'Pembangunan',
            'Kesehatan',
            'Pendidikan',
            'Sosial & Budaya',
            'Kegiatan Warga',
            'Pemberdayaan Kesejahteraan Keluarga (PKK)',
            'Karang Taruna'
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(
                ['name' => $category],
                ['slug' => Str::slug($category)]
            );
        }
    }
}
