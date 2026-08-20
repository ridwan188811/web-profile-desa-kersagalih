<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

\App\Models\Setting::updateOrCreate(
    ['key' => 'bagan_pemerintahan'],
    ['value' => 'structures/struktur-pemerintahan.png']
);

echo "Bagan setting updated!";
