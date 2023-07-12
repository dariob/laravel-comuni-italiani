<?php

namespace Dariob\LaravelComuniItaliani\Commands;

use Illuminate\Console\Command;

class LaravelComuniItalianiCommand extends Command
{
    public $signature = 'laravel-comuni-italiani';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
