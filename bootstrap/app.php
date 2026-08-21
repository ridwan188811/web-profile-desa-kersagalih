<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->web(append: [
            \App\Http\Middleware\LanguageMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->reportable(function (\Throwable $e) {
            if (isset($_SERVER['VERCEL']) || getenv('VERCEL')) {
                if ($e instanceof \ArgumentCountError && str_contains($e->getMessage(), 'createDriver')) {
                    $trace = $e->getTrace();
                    $failingClass = isset($trace[0]['class']) ? $trace[0]['class'] : 'Unknown';
                    echo "<h1>MANAGER CRASH DUMP</h1>";
                    echo "<pre>Failing Manager: " . $failingClass . "</pre>";
                    echo "<pre>Message: " . $e->getMessage() . "</pre>";
                    echo "<h2>ENV DUMP:</h2>";
                    echo "<pre>" . print_r($_ENV, true) . "</pre>";
                    exit;
                }
            }
        });
    })->create();
