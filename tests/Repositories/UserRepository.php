<?php

namespace tyasa81\DbRepositories\Tests\Repositories;

use tyasa81\DbRepositories\EloquentTrait;
use tyasa81\DbRepositories\RepositoryInterface;
use Workbench\App\Models\User;

final class UserRepository implements RepositoryInterface
{
    use EloquentTrait;

    private $model;

    // if your business logic requires you to use a different connector for certain scenarios,
    // remember to create a new custom config for that specific connector
    // do not pass in default db connectors to decouple application logic to application environment
    // hence you can move db to a remote type, and yet still assign a specific connector for that specific business requirement

    public function __construct(?string $connector = null)
    {
        $this->model = new User;
        if ($connector) {
            $this->model = $this->model->on($connector);
        }
    }
}
