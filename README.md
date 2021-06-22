# Feedvel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/avfigueredo/feedvel.svg?style=flat-square)](https://packagist.org/packages/avfigueredo/feedvel)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/avfigueredo/feedvel/run-tests?label=tests)](https://github.com/avfigueredo/feedvel/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/avfigueredo/feedvel/Check%20&%20fix%20styling?label=code%20style)](https://github.com/avfigueredo/feedvel/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/avfigueredo/feedvel.svg?style=flat-square)](https://packagist.org/packages/avfigueredo/feedvel)

## About 

Feedvel is an amazing package to obtain the feed RSS from a site. The Feedvel package uses the SimplePie parse feed. (http://simplepie.org/wiki/).

## Installation

You can install the package via composer:

```bash
composer require avfigueredo/feedvel
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Avfigueredo\Feedvel\FeedvelServiceProvider" --tag="feedvel-config"
```

This is the contents of the published config file:

```php
return [
    //Specifies the date format.
    'date_format' => 'd/m/Y H:i:s'
];
```

## Commands 

You can run the command below passing the URL as a parameter to check if the site has a feed.

```bash
php artisan feed url
```

## Usage

```php
use Avfigueredo\Feedvel\Feedvel;

$feed = Feedvel::from('https://www.theminimalists.com/feed/');

$feed->successful(); // bool
$feed->error(); // returns the message error.

// Content
$feed->title(); // returns the title.
$feed->author(); // returns the author.
$feed->authors(); // returns the authors.
$feed->posts(); // returns the posts.
$feed->original(); // returns the original simple pie object.


```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Andre Figueredo](https://github.com/avfigueredo)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
