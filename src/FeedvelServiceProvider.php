<?php

namespace Avfigueredo\Feedvel;

use Avfigueredo\Feedvel\Commands\FeedvelCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FeedvelServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('feedvel')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_feedvel_table')
            ->hasCommand(FeedvelCommand::class);
    }
}
