<?php

namespace Christophrumpel\MissingLivewireAssertions;

use Livewire\Testing\TestableLivewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class MissingLivewireAssertionsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('missing-livewire-assertions');
    }

    public function bootingPackage(): void
    {
        TestableLivewire::mixin(new CustomLivewireAssertionsMixin());
    }
}
