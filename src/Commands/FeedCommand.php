<?php

namespace Avfigueredo\Feedvel\Commands;

use Avfigueredo\Feedvel\Feedvel;
use Illuminate\Console\Command;

class FeedCommand extends Command
{
    public $signature = 'feed {url}';

    public $description = 'Test if a site has an available feed.';

    public function handle()
    {
        $this->comment("Checking...");

        $url = $this->argument('url');

        if (!$url) {
            $this->error('The parameter url is missing.');
            exit;
        }

        $feed = Feedvel::from($url);

        $this->table(
            ['Feed', 'Title', 'Posts'],
            [
                [
                    $feed->successful() ? 'OK' : 'NOK',
                    $feed->title(),
                    $feed->posts()->count(),
                ],
            ]
        );


        $this->comment('All done');
    }
}
