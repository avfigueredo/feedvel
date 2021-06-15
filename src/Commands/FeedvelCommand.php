<?php

namespace Avfigueredo\Feedvel\Commands;

use Illuminate\Console\Command;

class FeedvelCommand extends Command
{
    public $signature = 'feedvel';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
