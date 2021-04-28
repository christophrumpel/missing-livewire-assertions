<?php

namespace Christophrumpel\MissingLivewireAssertions\Tests;

use Christophrumpel\MissingLivewireAssertions\MissingLivewireAssertionsServiceProvider;
use Christophrumpel\MissingLivewireAssertions\Tests\Components\LivewireTestComponentA;
use Christophrumpel\MissingLivewireAssertions\Tests\Components\LivewireTestComponentB;
use Christophrumpel\MissingLivewireAssertions\Tests\View\Components\Button;
use Livewire\Livewire;
use Livewire\LivewireServiceProvider;

class AssertionsTest extends TestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            LivewireServiceProvider::class,
            MissingLivewireAssertionsServiceProvider::class,
        ];
    }

    /** @test * */
    public function it_checks_if_livewire_property_is_wired_to_a_field(): void
    {
        Livewire::test(LivewireTestComponentA::class)
            ->assertPropertyWired('user')
            ->assertPropertyWired('lazy')
            ->assertPropertyWired('defer');
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

    /** @test * */
    public function it_checks_if_it_sees_string_before_other_string(): void
    {
        Livewire::test(LivewireTestComponentA::class)
            ->assertSeeBefore('First value', 'Second value');
    }
}
