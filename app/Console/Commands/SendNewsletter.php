<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
Use Mail;

class SendNewsletter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:newsletter';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send a newsletter for bad users';

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
      $users = User::getBadUser();
      foreach ($users as $key => $user) {
         Mail::send('email/newsletter', ['user' => $user],
         function($m) use ($user){
            $m->from('tototo@free.fr', 'julien');
            $m->to($user->email, $user->nom)->subject('Lache un com!');
         });
      }
      $this->info('Newsletter envoyé à '.count($users));
    }
}
