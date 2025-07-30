<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SetAdminOffline extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:set-offline';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $cutoff = Carbon::now()->subSeconds(30); // ví dụ: nếu quá 30s không ping

        User::where('is_online', true)
            ->where('last_ping_at', '<', $cutoff)
            ->update(['is_online' => false]);

        $this->info('Reset trạng thái offline thành công.');
    }
}
