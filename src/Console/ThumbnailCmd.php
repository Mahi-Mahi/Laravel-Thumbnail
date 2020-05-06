<?php

namespace Mahi\Thumbnail\Console;

use Illuminate\Console\Command;
use Mahi\Thumbnail\Facades\Thumbnail;

class ThumbnailCmd extends Command
{
    protected $signature = 'dummy';

    protected $description = 'Output a dummy';

    public function handle()
    {
        $this->info(Thumbnail::dummy('dummy'));
    }
}
