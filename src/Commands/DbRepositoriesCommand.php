<?php

namespace tyasa81\DbRepositories\Commands;

use Illuminate\Console\Command;

class DbRepositoriesCommand extends Command
{
    public $signature = 'dbrepositories';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
