<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

// Fix for Vercel Read-Only Filesystem
if (isset($_SERVER['VERCEL']) || getenv('VERCEL') || isset($_ENV['VERCEL'])) {
    $app->useStoragePath('/tmp/storage');
    
    // Force Laravel to use /tmp for all bootstrap caches
    $_ENV['APP_SERVICES_CACHE'] = '/tmp/storage/bootstrap/cache/services.php';
    $_ENV['APP_PACKAGES_CACHE'] = '/tmp/storage/bootstrap/cache/packages.php';
    $_ENV['APP_CONFIG_CACHE'] = '/tmp/storage/bootstrap/cache/config.php';
    $_ENV['APP_ROUTES_CACHE'] = '/tmp/storage/bootstrap/cache/routes.php';
    $_ENV['APP_EVENTS_CACHE'] = '/tmp/storage/bootstrap/cache/events.php';
    $_ENV['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';
    
    // Force safe drivers to prevent database driver crashing before migration
    $safeDrivers = [
        'SESSION_DRIVER' => 'cookie',
        'CACHE_STORE' => 'array',
        'CACHE_DRIVER' => 'array',
        'QUEUE_CONNECTION' => 'sync',
        'LOG_CHANNEL' => 'errorlog',
        'APP_DEBUG' => 'true'
    ];
    
    foreach ($safeDrivers as $key => $value) {
        $_SERVER[$key] = $value;
        $_ENV[$key] = $value;
        putenv("$key=$value");
    }
    
    $directories = [
        '/tmp/storage/framework/views',
        '/tmp/storage/framework/cache/data',
        '/tmp/storage/framework/sessions',
        '/tmp/storage/logs',
        '/tmp/storage/app/public',
        '/tmp/storage/bootstrap/cache',
    ];
    foreach ($directories as $dir) {
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
    }
}

try {
    $app->handleRequest(Request::capture());
} catch (\Throwable $e) {
    http_response_code(500);
    echo "<h1>FATAL ERROR:</h1>";
    echo "<pre>Message: " . $e->getMessage() . "</pre>";
    echo "<pre>File: " . $e->getFile() . " on line " . $e->getLine() . "</pre>";
    echo "<h2>Trace:</h2>";
    echo "<pre>" . $e->getTraceAsString() . "</pre>";
}
