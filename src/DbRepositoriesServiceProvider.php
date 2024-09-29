<?php

namespace tyasa81\DbRepositories;

use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class DbRepositoriesServiceProvider extends ServiceProvider
{
    public function register() {}

    public function boot()
    {
        app()->bind('UserRepository', function () {
            return new UserRepository;
        });
    }
}
