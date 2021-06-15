<?php

namespace Avfigueredo\Feedvel\Commands;

use Assert\Assertion;
use Illuminate\Console\Command;

class Feed extends Command
{
    public $signature = 'feed {site}';

    public $description = 'Test if a site has a available feed.';

    public function handle()
    {
        $site = $this->argument('site');

        Assertion::url($site);

        $this->comment('All done');
    }
}
