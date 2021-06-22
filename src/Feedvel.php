<?php

namespace Avfigueredo\Feedvel;

use Assert\Assertion;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use SimplePie;

class Feedvel
{
    private SimplePie $feed;

    private function __construct(string $url)
    {
        $this->init($url);
    }

    private function init(string $url): void
    {
        $this->feed = new SimplePie();
        $this->feed->set_feed_url($url);
        $this->feed->enable_cache(false);
        $this->feed->init();
    }

    public static function from(string $url): self
    {
        Assertion::url($url);

        return new self($url);
    }

    public function successful(): bool
    {
        return empty($this->feed->error);
    }

    public function error()
    {
        return $this->feed->error();
    }

    public function title(): ?string
    {
        return $this->feed->get_title();
    }

    public function author(): ?string
    {
        return $this->feed->get_author();
    }

    public function authors(): ?array
    {
        return $this->feed->get_authors();
    }

    public function original(): SimplePie
    {
        return $this->feed;
    }

    public function posts(): Collection
    {
        return collect($this->feed->get_items())->map(fn ($item) => [
            'guid' => $item->data['child']['']['guid'][0]['data'],
            'title' => $item->data['child']['']['title'][0]['data'],
            'link' => $item->data['child']['']['link'][0]['data'],
            'publish_date' => Carbon::parse($item->data['child']['']['pubDate'][0]['data'])->format(config('feedvel.date_format')),
            'content'      => strip_tags($item->data['child']['']['description'][0]['data']),
            'categories'   => $this->categories($item),
        ]);
    }

    private function categories($item)
    {
        if (isset($item->data['child']['']['category'])) {
            return collect($item->data['child']['']['category'])->map(fn($category) => $category['data'])->toArray();
        }

        return [];
    }
}
