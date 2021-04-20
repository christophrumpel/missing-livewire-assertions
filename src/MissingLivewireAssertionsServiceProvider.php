<?php

namespace Christophrumpel\MissingLivewireAssertions;

use Christophrumpel\MissingLivewireAssertions\View\Components\Button;
use Illuminate\Support\Facades\Blade;
use Livewire\Testing\TestableLivewire;
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

    public function bootingPackage(): void
    {
        TestableLivewire::mixin(new CustomLivewireAssertionsMixin());
        Blade::component('button', Button::class);

    }
}
