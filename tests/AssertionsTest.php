<?php

namespace Tests;

use Christophrumpel\MissingLivewireAssertions\MissingLivewireAssertionsServiceProvider;
use Livewire\Livewire;
use Livewire\LivewireServiceProvider;
use Tests\Components\FileDownloadComponent;
use Tests\Components\LivewireTestComponentA;
use Tests\Components\LivewireTestComponentB;
use Tests\Components\LivewireTestComponentC;
use Tests\Components\LivewireTestComponentD;
use Tests\View\Components\Button;

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
            ->assertPropertyWired('blur')
            ->assertPropertyWired('lazy')
            ->assertPropertyWired('live')
            ->assertPropertyWired('debounce')
            ->assertPropertyWired('lazy-with-duration')
            ->assertPropertyWired('debounce-with-duration')
            ->assertPropertyWired('singlequote');
        ;
    }

    /** @test * */
    public function it_checks_if_livewire_property_is_not_wired_to_a_field(): void
    {
        Livewire::test(LivewireTestComponentA::class)
            ->assertPropertyNotWired('user_not_wired')
            ->assertPropertyNotWired('blur_not_wired')
            ->assertPropertyNotWired('lazy_not_wired')
            ->assertPropertyNotWired('live_not_wired')
            ->assertPropertyNotWired('debounce_not_wired')
            ->assertPropertyNotWired('lazy-with-duration_not_wired')
            ->assertPropertyNotWired('debounce-with-duration_not_wired')
            ->assertPropertyNotWired('singlequote_not_wired');
    }

    /** @test * */
    public function it_checks_if_livewire_property_is_entangled_to_a_field(): void
    {
        Livewire::test(LivewireTestComponentA::class)
            ->assertPropertyEntangled('entangled-x-data-state-single-quote')
            ->assertPropertyEntangled('entangled-x-data-state-double-quote')
            ->assertPropertyEntangled('entangled-x-data-single-quote')
            ->assertPropertyEntangled('entangled-x-data-single-quote');
    }

    /** @test * */
    public function it_checks_if_livewire_property_is_not_entangled_to_a_field(): void
    {
        Livewire::test(LivewireTestComponentA::class)
            ->assertPropertyNotEntangled('entangled-x-data-state-single-quote-not-entangled')
            ->assertPropertyNotEntangled('entangled-x-data-state-double-quote-not-entangled')
            ->assertPropertyNotEntangled('entangled-x-data-single-quote-not-entangled')
            ->assertPropertyNotEntangled('entangled-x-data-single-quote-not-entangled');
    }

    /** @test * */
    public function it_checks_if_livewire_method_is_wired_to_a_field(): void
    {
        Livewire::test(LivewireTestComponentA::class)
            ->assertMethodWired('prevent')
            ->assertMethodWired('submit')
            ->assertMethodWired('singlequote')
            ->assertMethodWired('$refresh')
            ->assertMethodWired('$toggle(\'sortAsc\')')
            ->assertMethodWired('$dispatch(\'post-created\')')
            ->assertMethodWired('search($event.target.value)')
            ->assertMethodWired('$wire.$refresh()')
            ->assertMethodWired('$parent.removePost({{ $post->id }})')
            ->assertMethodWired('$set(\'query\', \'\')');
    }

    /** @test * */
    public function it_checks_if_livewire_method_is_not_wired_to_a_field(): void
    {
        Livewire::test(LivewireTestComponentA::class)
            ->assertMethodNotWired('prevent_not_wired')
            ->assertMethodNotWired('submit_not_wired')
            ->assertMethodNotWired('singlequote_not_wired');
    }

    /** @test * */
    public function it_checks_if_livewire_method_is_wired_with_params_to_a_field(): void
    {
        Livewire::test(LivewireTestComponentA::class)
            ->assertMethodWired('params')
            ->assertMethodWired('preventParams');
    }

    /** @test * */
    public function it_checks_if_livewire_method_is_not_wired_with_params_to_a_field(): void
    {
        Livewire::test(LivewireTestComponentA::class)
            ->assertMethodNotWired('params_not_wired')
            ->assertMethodNotWired('preventParams_not_wired');
    }

    /** @test * */
    public function it_checks_if_a_generic_livewire_method_is_wired_to_a_field(): void
    {
        Livewire::test(LivewireTestComponentD::class)
            ->assertMethodWiredToAction('change', 'change')
            ->assertMethodWiredToAction('keydown', 'keydown')
            ->assertMethodWiredToAction('keyup', 'keyup')
            ->assertMethodWiredToAction('mouseenter', 'mouseEnter')
            ->assertMethodWiredToAction('keydown.enter', 'keyDownEnter')
            ->assertMethodWiredToAction('keydown.shift.enter', 'keyDownShiftEnterMethod')
            ->assertMethodWiredToAction('transitionend', 'transitionendMethod')
            ->assertMethodWiredToAction('custom-event', 'customEventMethod')
            ->assertMethodWiredToAction('change', 'singlequote')
            ->assertMethodWiredToAction('mouseenter', '$toggle(\'sortAsc\')')
            ->assertMethodWiredToAction('mouseenter', '$dispatch(\'post-created\')')
            ->assertMethodWiredToAction('mouseenter', 'search($event.target.value)')
            ->assertMethodWiredToAction('mouseenter', '$wire.$refresh()')
            ->assertMethodWiredToAction('mouseenter', '$parent.removePost({{ $post->id }})')
            ->assertMethodWiredToAction('mouseenter', '$set(\'query\', \'\')')
            ;
    }

    /** @test * */
    public function it_checks_if_a_generic_livewire_method_is_not_wired_to_a_field(): void
    {
        Livewire::test(LivewireTestComponentD::class)
            ->assertMethodNotWiredToAction('change', 'change_not_wired')
            ->assertMethodNotWiredToAction('keydown', 'keydown_not_wired')
            ->assertMethodNotWiredToAction('keyup', 'keyup_not_wired')
            ->assertMethodNotWiredToAction('mouseenter', 'mouseEnter_not_wired')
            ->assertMethodNotWiredToAction('keydown.enter', 'keyDownEnter_not_wired')
            ->assertMethodNotWiredToAction('keydown.shift.enter', 'keyDownShiftEnterMethod_not_wired')
            ->assertMethodNotWiredToAction('transitionend', 'transitionendMethod_not_wired')
            ->assertMethodNotWiredToAction('custom-event', 'customEventMethod_not_wired')
            ;
    }

    /** @test * */
    public function it_checks_if_a_generic_livewire_method_is_wired_with_params_to_a_field()
    {
        Livewire::test(LivewireTestComponentD::class)
            ->assertMethodWiredToAction('mouseenter', 'params');
    }

    /** @test * */
    public function it_checks_if_a_generic_livewire_method_is_not_wired_with_params_to_a_field()
    {
        Livewire::test(LivewireTestComponentD::class)
            ->assertMethodNotWiredToAction('mouseenter', 'params_not_wired');
    }

    /** @test * */
    public function it_checks_if_livewire_method_is_wired_to_a_form(): void
    {
        Livewire::test(LivewireTestComponentA::class)
            ->assertMethodWiredToForm('upload')
            ->assertMethodWiredToForm('uploadSinglequote');
    }

    /** @test * */
    public function it_checks_if_livewire_method_is_not_wired_to_a_form(): void
    {
        Livewire::test(LivewireTestComponentA::class)
            ->assertMethodNotWiredToForm('upload_not_wired')
            ->assertMethodNotWiredToForm('uploadSinglequote_not_wired');
    }

    /** @test * */
    public function it_checks_if_livewire_method_is_wired_to_a_field_with_an_event(): void
    {
        Livewire::test(LivewireTestComponentA::class)
            ->assertMethodWiredToEvent('prevent', 'click')
            ->assertMethodWiredToEvent('submit', 'click')
            ->assertMethodWiredToEvent('singlequote', 'click')
            ->assertMethodWiredToEvent('keyup', 'keyup')
            ->assertMethodWiredToEvent('keydown-page-down', 'keydown')
            ->assertMethodWiredToEvent('keydown-page-down', 'keydown.page-down')
            ->assertMethodWiredToEvent('changeDebounce', 'change')
            ->assertMethodWiredToEvent('changeDebounce', 'change.debounce')
            ->assertMethodWiredToEvent('changeDebounce', 'change.debounce.500ms');
    }

    /** @test * */
    public function it_checks_if_livewire_method_is_not_wired_to_a_field_with_an_event(): void
    {
        Livewire::test(LivewireTestComponentA::class)
            ->assertMethodNotWiredToEvent('prevent_not_wired', 'click')
            ->assertMethodNotWiredToEvent('submit_not_wired', 'click')
            ->assertMethodNotWiredToEvent('singlequote_not_wired', 'click')
            ->assertMethodNotWiredToEvent('keyup', 'keydown')
            ->assertMethodNotWiredToEvent('keyup_not_wired', 'keyup')
            ->assertMethodNotWiredToEvent('changeDebounce', 'debounce')
            ->assertMethodNotWiredToEvent('changeDebounce_not_wired', 'change');
    }

    /** @test * */
    public function it_checks_if_livewire_method_is_wired_with_params_to_a_field_with_an_event(): void
    {
        Livewire::test(LivewireTestComponentA::class)
            ->assertMethodWiredToEvent('params', 'click')
            ->assertMethodWiredToEvent('preventParams', 'click')
            ->assertMethodWiredToEvent('setSelector', 'change');
    }

    /** @test * */
    public function it_checks_if_livewire_method_is_not_wired_with_params_to_a_field_with_an_event(): void
    {
        Livewire::test(LivewireTestComponentA::class)
            ->assertMethodNotWiredToEvent('params_not_wired', 'click')
            ->assertMethodNotWiredToEvent('preventParams_not_wired', 'click')
            ->assertMethodNotWiredToEvent('setSelector_not_wired', 'change')
            ->assertMethodNotWiredToEvent('setSelector', 'click');
    }

    /** @test * */
    public function it_checks_if_livewire_method_is_wired_to_a_field_with_an_event_without_modifiers(): void
    {
        Livewire::test(LivewireTestComponentA::class)
            ->assertMethodWiredToEventWithoutModifiers('submit', 'click')
            ->assertMethodWiredToEventWithoutModifiers('singlequote', 'click')
            ->assertMethodWiredToEventWithoutModifiers('keyup', 'keyup')
            ->assertMethodWiredToEventWithoutModifiers('keydown-page-down', 'keydown.page-down');
    }

    /** @test * */
    public function it_checks_if_livewire_method_is_not_wired_to_a_field_with_an_event_without_modifiers(): void
    {
        Livewire::test(LivewireTestComponentA::class)
            ->assertMethodNotWiredToEventWithoutModifiers('prevent', 'click')
            ->assertMethodNotWiredToEventWithoutModifiers('prevent_not_wired', 'click')
            ->assertMethodNotWiredToEventWithoutModifiers('submit_not_wired', 'click')
            ->assertMethodNotWiredToEventWithoutModifiers('singlequote_not_wired', 'click')
            ->assertMethodNotWiredToEventWithoutModifiers('keydown-page-down', 'keydown');
    }

    /** @test * */
    public function it_checks_if_livewire_method_is_wired_with_params_to_a_field_with_an_event_without_modifiers(): void
    {
        Livewire::test(LivewireTestComponentA::class)
            ->assertMethodWiredToEventWithoutModifiers('params', 'click')
            ->assertMethodWiredToEventWithoutModifiers('preventParams', 'click.prevent')
            ->assertMethodWiredToEventWithoutModifiers('setSelector', 'change');
    }

    /** @test * */
    public function it_checks_if_livewire_method_is_not_wired_with_params_to_a_field_with_an_event_without_modifiers(): void
    {
        Livewire::test(LivewireTestComponentA::class)
            ->assertMethodNotWiredToEventWithoutModifiers('params_not_wired', 'click')
            ->assertMethodNotWiredToEventWithoutModifiers('preventParams', 'click');
    }

    /** @test * */
    public function it_checks_if_livewire_component_contains_another_livewire_component_by_class_name(): void
    {
        Livewire::test(LivewireTestComponentA::class)
            ->assertContainsLivewireComponent(LivewireTestComponentB::class);
    }

    /** @test * */
    public function it_checks_if_livewire_component_does_not_contain_another_livewire_component_by_class_name(): void
    {
        Livewire::test(LivewireTestComponentA::class)
            ->assertDoesNotContainLivewireComponent(NonExistantLivewireTestComponent::class);
    }

    /** @test * */
    public function it_checks_if_livewire_component_contains_another_livewire_component_by_component_name(): void
    {
        Livewire::test(LivewireTestComponentA::class)
            ->assertContainsLivewireComponent('tests.components.livewire-test-component-b');
    }

    /** @test * */
    public function it_checks_if_livewire_component_does_not_contain_another_livewire_component_by_component_name(): void
    {
        Livewire::test(LivewireTestComponentA::class)
            ->assertDoesNotContainLivewireComponent('non-existant-livewire-test-component');
    }

    /** @test * */
    public function it_checks_if_livewire_component_contains_a_blade_component_by_class_name(): void
    {
        Livewire::test(LivewireTestComponentA::class)
            ->assertContainsBladeComponent(Button::class);
    }

    /** @test * */
    public function it_checks_if_livewire_component_does_not_contain_a_blade_component_by_class_name(): void
    {
        Livewire::test(LivewireTestComponentA::class)
            ->assertDoesNotContainBladeComponent(NonExistantButton::class);
    }

    /** @test * */
    public function it_checks_if_livewire_component_contains_a_blade_component_by_component_name(): void
    {
        Livewire::test(LivewireTestComponentA::class)
            ->assertContainsBladeComponent('button');
    }

    /** @test * */
    public function it_checks_if_livewire_component_does_not_contain_a_blade_component_by_component_name(): void
    {
        Livewire::test(LivewireTestComponentA::class)
            ->assertDoesNotContainBladeComponent('non-existant-button');
    }

    /** @test * */
    public function it_checks_if_it_sees_string_before_other_string(): void
    {
        Livewire::test(LivewireTestComponentA::class)
            ->assertSeeBefore('First value', 'Second value');
    }

    /** @test * */
    public function it_checks_if_it_does_not_see_string_before_other_string(): void
    {
        Livewire::test(LivewireTestComponentA::class)
            ->assertDoNotSeeBefore('Second value', 'First value');
    }

    /** @test * */
    public function it_checks_if_it_sees_a_blade_directive(): void
    {
        Livewire::test(LivewireTestComponentC::class)
            ->assertContainsLivewireComponent(LivewireTestComponentB::class);
    }

    /** @test * */
    public function it_checks_if_it_does_not_see_a_blade_directive(): void
    {
        Livewire::test(LivewireTestComponentC::class)
            ->assertDoesNotContainLivewireComponent(NonExistantLivewireTestComponent::class);
    }

    /** @test */
    public function can_check_a_downloaded_file_contains()
    {
        Livewire::test(FileDownloadComponent::class)
            ->call('streamDownload', 'download.txt')
            ->assertFileDownloadedContains('alpine');
    }

    /** @test */
    public function can_check_a_downloaded_file_does_not_contain()
    {
        Livewire::test(FileDownloadComponent::class)
            ->call('streamDownload', 'download.txt')
            ->assertFileDownloadedNotContains('vuejs');
    }
}
