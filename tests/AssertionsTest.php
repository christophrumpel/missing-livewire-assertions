<?php

namespace Christophrumpel\MissingLivewireAssertions\Tests;


use Christophrumpel\MissingLivewireAssertions\MissingLivewireAssertionsServiceProvider;
use Christophrumpel\MissingLivewireAssertions\TestLivewireComponent;
use Livewire\Livewire;
use Livewire\LivewireServiceProvider;

class AssertionsTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            LivewireServiceProvider::class,
            MissingLivewireAssertionsServiceProvider::class
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        $app['config']->set('app.key', 'base64:Hupx3yAySikrM2/edkZQNQHslgDWYfiBfCuSThJ5SK8=');
    }

    /** @test * */
    public function it_checks_if_livewire_method_is_wired_to_a_field(): void
    {
        Livewire::test(TestLivewireComponent::class)
            ->assertMethodWired('submit');
    }
}
