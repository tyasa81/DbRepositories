<?php

namespace tyasa81\DbRepositories;

use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;
use tyasa81\DbRepositories\Commands\DbRepositoriesCommand;

class DbRepositoriesServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        app()->bind('UserRepository',function(){
            return new UserRepository();
        });        
    }
}
