<?php

namespace App\Console\Commands;

use App\Mail\UnbannedUserMail;
use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class UnbannedUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:unbanned_user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Unbanned user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
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
        $data = User::where('status', User::STATUS['BANNED'])->where('banned_datetime', '<', Carbon::now())->get();
        $data_email = [];
        foreach ($data as $user) {
            $user->status = User::STATUS['ONGOING'];
            $user->banned_datetime = NULL;
            $user->save();

            $data_email = [$user->email];
        }
        $this->info('Demo:Cron Cummand Run successfully!');

        // Mail::to($data_email)->send(new UnbannedUserMail());
    }
}
