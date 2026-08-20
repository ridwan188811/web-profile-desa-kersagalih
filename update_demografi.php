<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$settings = [
    'penduduk_total' => '3793',
    'penduduk_kk' => '1173',
    'penduduk_lk' => '1923',
    'penduduk_pr' => '1870'
];

foreach ($settings as $key => $value) {
    \App\Models\Setting::updateOrCreate(['key' => $key], ['value' => $value]);
}

echo "Settings updated successfully!";
