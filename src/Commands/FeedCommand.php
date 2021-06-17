<?php

namespace Avfigueredo\Feedvel\Commands;

use Assert\Assertion;
use Illuminate\Console\Command;

class FeedCommand extends Command
{
//    public $signature = 'feed {site}';
    public $signature = 'feed';

    public $description = 'Test if a site has a available feed.';

    public function handle()
    {
        $this->comment("Testing...");

//        $site = $this->argument('site');

//        Assertion::url($site);

//        $this->comment('All done')done;
    }
}
