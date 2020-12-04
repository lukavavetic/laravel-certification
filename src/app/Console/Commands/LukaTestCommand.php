<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class LukaTestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send {user} {--queue}';
    //  protected $signature = 'email:send 
    //  {user* : the list of users} 
    //  {--id=* : the list of users ids}'; 
    //protected $signature = 'email:send {user*} {--id=*}'; // expect user as array and option id as array
    //protected $signature = 'email:send {user} {--queue}'; // if it passed, then is true, otherwise is false
    //protected $signature = 'email:send {user} {--queue=default}'; // default option value
    //protected $signature = 'email:send {user} {--queue=}'; // if user must specify value of option
    //protected $signature = 'email:send {user?}'; // optional
    //protected $signature = 'email:send {user=foo}'; // with default value

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        // dump($this->option('id'));
        // dump($this->argument('user'));
        // dump($this->options());
        // dump($this->arguments());

        // $name = $this->ask('What is your name?');
        // $password = $this->secret('What is the password?');
        // dump("name", $name);
        // dump("pass", $password);
        // $confirmation = $this->confirm('Do you wish to continue?');
        // dump("confirmation", $confirmation);

        // $firstname = $this->anticipate('What is your name?', ['Taylor', 'Dayle']);
        // dump($firstname);

      //   $lastname = $this->choice(
      //     'What is your name?',
      //     ['Taylor', 'Dayle'],
      //     ['Matija', 'Luka'],
      //     null,
      //     false
      // );
      // dump($lastname);

      // $this->info('Display this on the screen');
      // $this->newLine();
      // $this->error('Something went wrong!');
      // $this->newLine(3);
      // $this->line('Display this on the screen');

      // $headers = ['Name', 'Email'];
      // $users = [
      //   ["name" => "luka", "email" => "lgmail"],
      //   ["name" => "luka", "email" => "lgmail"],
      // ];
      // $this->table($headers, $users);

      $users = ["Matija", "Luka"];

      $bar = $this->output->createProgressBar(count($users));

      $bar->start();

      foreach ($users as $user) {
          // perform some task on user

          $bar->advance();
      }

      $bar->finish();
    }
}

// php artisan email:send luka
// php artisan email:send foo bar
// php artisan email:send foo bar  --id=1 --id=2