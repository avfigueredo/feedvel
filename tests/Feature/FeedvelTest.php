<?php

namespace Avfigueredo\Feedvel\Tests\Feature;

use Avfigueredo\Feedvel\Feedvel;
use Avfigueredo\Feedvel\Tests\TestCase;

class FeedvelTest extends TestCase
{
    /** @test */
    public function it_invalid_url_throws_a_exception()
    {
        $this->expectException(\InvalidArgumentException::class);
        Feedvel::from('123test.com');
    }

    /** @test */
    public function it_can_get_a_feed()
    {
        $feed = Feedvel::from('https://www.theminimalists.com/feed/');

        $this->assertTrue($feed->successful());
        $this->assertEquals('The Minimalists', $feed->title());
        $this->assertNull($feed->author());
        $this->assertNull($feed->authors());
        $this->assertCount(10, $feed->posts()->toArray());
    }

}
