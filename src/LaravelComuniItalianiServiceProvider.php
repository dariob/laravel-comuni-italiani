<?php

namespace Dariob\LaravelComuniItaliani;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Dariob\LaravelComuniItaliani\Commands\LaravelComuniItalianiCommand;

class LaravelComuniItalianiServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-comuni-italiani')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-comuni-italiani_table')
            ->hasCommand(LaravelComuniItalianiCommand::class);
    }
}
