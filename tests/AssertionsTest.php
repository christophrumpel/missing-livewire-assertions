<?php

namespace Christophrumpel\MissingLivewireAssertions\Tests;

use Christophrumpel\MissingLivewireAssertions\LivewireTestComponentA;
use Christophrumpel\MissingLivewireAssertions\LivewireTestComponentB;
use Christophrumpel\MissingLivewireAssertions\MissingLivewireAssertionsServiceProvider;
use Christophrumpel\MissingLivewireAssertions\View\Components\Button;
use Livewire\Livewire;
use Livewire\LivewireServiceProvider;

class AssertionsTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            LivewireServiceProvider::class,
            MissingLivewireAssertionsServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        $app['config']->set('app.key', 'base64:Hupx3yAySikrM2/edkZQNQHslgDWYfiBfCuSThJ5SK8=');
    }

    /** @test * */
    public function it_checks_if_livewire_property_is_wired_to_a_field(): void
    {
        Livewire::test(LivewireTestComponentA::class)
            ->assertPropertyWired('user');
    }

    /** @test * */
    public function it_checks_if_livewire_method_is_wired_to_a_field(): void
    {
        Livewire::test(LivewireTestComponentA::class)
            ->assertMethodWired('submit');
    }

    /** @test * */
    public function it_checks_if_livewire_component_contains_another_livewire_component_by_class_name(): void
    {
        Livewire::test(LivewireTestComponentA::class)
            ->assertContainsLivewireComponent(LivewireTestComponentB::class);
    }

    /** @test * */
    public function it_checks_if_livewire_component_contains_another_livewire_component_by_component_name(): void
    {
        Livewire::test(LivewireTestComponentA::class)
            ->assertContainsLivewireComponent('livewire-test-component-b');
    }

    /** @test * */
    public function it_checks_if_livewire_component_contains_a_blade_component_by_class_name(): void
    {
        Livewire::test(LivewireTestComponentA::class)
            ->assertContainsBladeComponent(Button::class);
    }

    /** @test * */
    public function it_checks_if_livewire_component_contains_a_blade_component_by_component_name(): void
    {
        Livewire::test(LivewireTestComponentA::class)
            ->assertContainsBladeComponent('button');
    }
}
