<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use  Illuminate\Support\Facades\Schedule;
use App\Console\Commands\AutoConfirmOrders;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::command( AutoConfirmOrders::class)->everyMinute();
Schedule::command('admin:set-offline')->everyMinute();
Schedule::command('app:delete-old-chat-rooms')->everyTenMinutes();
