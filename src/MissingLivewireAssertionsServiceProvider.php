<?php

namespace Christophrumpel\MissingLivewireAssertions;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Christophrumpel\MissingLivewireAssertions\Commands\MissingLivewireAssertionsCommand;

class MissingLivewireAssertionsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('missing_livewire_assertions')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_missing_livewire_assertions_table')
            ->hasCommand(MissingLivewireAssertionsCommand::class);
    }
}
