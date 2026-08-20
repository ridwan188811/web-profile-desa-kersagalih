<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Setting;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['key' => 'site_title', 'value' => 'Desa Kersagalih'],
            ['key' => 'site_logo', 'value' => '/images/logo.png'],
            ['key' => 'contact_email', 'value' => 'admin@kersagalih.desa.id'],
            ['key' => 'contact_phone', 'value' => '0812-3456-7890'],
            ['key' => 'contact_address', 'value' => 'Kantor Kepala Desa Kersagalih, Kec. Jatiwaras, Kab. Tasikmalaya'],
            ['key' => 'social_facebook', 'value' => 'https://facebook.com'],
            ['key' => 'social_instagram', 'value' => 'https://instagram.com'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(['key' => $setting['key']], ['value' => $setting['value']]);
        }
    }
}
