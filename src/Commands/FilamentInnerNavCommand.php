<?php

namespace Rawilk\FilamentInnerNav\Commands;

use Illuminate\Console\Command;

class FilamentInnerNavCommand extends Command
{
    public $signature = 'filament-inner-nav';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
