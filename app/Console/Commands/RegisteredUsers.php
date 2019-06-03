<?php

namespace App\Console\Commands;

use App\Mail\SendMailable;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\User;

class RegisteredUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'registered:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envía un correo cada hora con el numero de usuarios registrados';

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
     * @return mixed
     */
    public function handle()
    {
        $totalUsers = User::all()->count();
        Mail::to('alberto.bautista89@hotmail.com')->send(new SendMailable($totalUsers));
    }
}
