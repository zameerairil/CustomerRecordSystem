<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Customer;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Mail\EmailSend;

class SendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Peringatan untuk pelanggan mengenai tarikh luput insurans';

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
        foreach (Customer::all() as $user) {
            if (Carbon::now() > $user->expiry) {
                Mail::to($user->email)->send(new EmailSend());
            }
        }

        $this->info('Peringatan Tarikh Luput telah Dihantar');
        
    }
}
