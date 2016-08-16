<?php

namespace App\Console\Commands;

use \App\User;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class AppInstaller extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install desh app to your machine';

    protected $user_name, $user_email, $user_psw;

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

        $msg = "Please be patient while the application is installing.....";

        $this->commentDecorator($msg);

        $this->call('migrate:refresh');

        $this->singleDivider();

        $this->line("Filling data tables with necessary information...");

        $this->call('db:seed');

        $this->getUserInfo();

        $this->showUserInfo();


       if($this->confirm('Do you want to register your account with these information ? (Y|N)')){


           $this->registerUser($this->user_name, $this->user_email, $this->user_psw);

           $msg = "Congrats ! Application has been installed successfully.";

           $this->hypen_decorator($msg);

           //$this->call('serve');


       }else{

           $this->error(" User Registration aborted ! ");

           $this->error(" Installation failed ! ");

       };


    }


    protected  function getUserInfo()
    {

        $this->user_name = $this->ask('What will be the username for your account ?', 'Fahad Ahmed');
        $this->user_email = $this->ask('Please provide your email address to register your account', 'test@example.com');
        $this->user_psw = $this->secret('Please type a password for your account');

    }

    protected function showUserInfo()
    {

        $msg = "your information's are ...";

        $this->comment($msg);
        $this->line('');

        $this->line("Name: ". $this->user_name);
        $this->line('');

        $this->line("Email: ". $this->user_email);
        $this->line('');

    }


    protected function registerUser($user_name, $user_email, $user_psw){

        $user = new User();

        $terminal_user = $user->create(['name'=>$user_name, 'email'=>$user_email, 'password'=>bcrypt($user_psw)]);

        $users = $user->all();

        $this->doubleBlankLine();

        $header = ['id', 'name', 'email', 'created_at', 'updated_at'];

        $this->table($header, $users);


        $msg = "--> Activating the user by assigning admin role .....";

        $this->hypen_decorator($msg);

        $terminal_user->roles()->sync([1]);

    }


    protected function hypen_decorator($msg){

        $this->doubleBlankLine();
        $this->divider();
        $this->line('');
        $this->info($msg);
        $this->line('');
        $this->divider();

    }

    protected function commentDecorator($msg){

        $this->doubleBlankLine();
        $this->comment("/*-----------------------------------------------------------*/");
        $this->comment("|* " . $msg . "*|");
        $this->comment("/*-----------------------------------------------------------*/");
        $this->doubleBlankLine();


    }

    protected function singleDivider(){

        $this->doubleBlankLine();
        $this->divider();
        $this->doubleBlankLine();

    }

    protected function doubleBlankLine(){

        $this->line('');
        $this->line('');

    }

    protected function divider(){

        $this->line('------------------------------------------------------------');

    }


}
