<?php

use App\Http\Middleware\CheckDisscountMiddleware;
use App\Models\HoaDon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withSchedule(function (\Illuminate\Console\Scheduling\Schedule $schedule) {
        $schedule->command('orders:cancel-expired')->everyFiveMinutes();
        $schedule->command('promotions:update-expired')->daily();
    })
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->append(CheckDisscountMiddleware::class);
    })

    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
