<?php

namespace Avfigueredo\Feedvel\Tests\Feature\Commands;

use Avfigueredo\Feedvel\Commands\FeedCommand;
use Avfigueredo\Feedvel\Tests\TestCase;

class FeedCommandTest extends TestCase
{
    /** @test */
    public function it_can_check_if_a_site_has_a_feed()
    {
        $this
            ->artisan(FeedCommand::class, [
                'url' => 'https://www.theminimalists.com/feed/',
            ])
            ->assertExitCode(0);
    }
}
