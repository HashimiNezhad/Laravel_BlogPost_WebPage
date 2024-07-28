<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UpdateUserStatuses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:update-status';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update user statuses based on inactivity';

    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $inactiveThreshold = now()->subMinutes(30); // Example threshold
        DB::table('users')
            ->where('status', 'active')
            ->where('last_login_at', '<', $inactiveThreshold)
            ->update(['status' => 'inactive']);
    }
}
