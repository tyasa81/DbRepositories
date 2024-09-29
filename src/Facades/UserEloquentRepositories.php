<?php

namespace tyasa81\DbRepositories\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \tyasa81\DbRepositories\DbRepositories
 */
class UserRepositoryFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'UserRepository';
    }
}
