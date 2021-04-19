<?php

namespace Christophrumpel\MissingLivewireAssertions;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class MissingLivewireAssertionsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {

        $package
            ->name('missing_livewire_assertions')
            ->hasViews();
    }
}
