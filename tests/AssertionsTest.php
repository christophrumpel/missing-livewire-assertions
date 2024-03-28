<?php

use \Tests\NonExistantButton;
use \Tests\NonExistantLivewireTestComponent;
use Livewire\Livewire;
use Tests\Components\FileDownloadComponent;
use Tests\Components\LivewireTestComponentA;
use Tests\Components\LivewireTestComponentB;
use Tests\Components\LivewireTestComponentC;
use Tests\Components\LivewireTestComponentD;
use Tests\TestCase;
use Tests\View\Components\Button;

uses(TestCase::class);

it('checks if Livewire property is wired to a field', function () {
    Livewire::test(LivewireTestComponentA::class)
        ->assertPropertyWired('user')
        ->assertPropertyWired('blur')
        ->assertPropertyWired('defer')
        ->assertPropertyWired('lazy')
        ->assertPropertyWired('live')
        ->assertPropertyWired('debounce')
        ->assertPropertyWired('lazy-with-duration')
        ->assertPropertyWired('debounce-with-duration')
        ->assertPropertyWired('singlequote');
});

it('checks if Livewire property is not wired toa field', function () {
    Livewire::test(LivewireTestComponentA::class)
        ->assertPropertyNotWired('user_not_wired')
        ->assertPropertyNotWired('blur_not_wired')
        ->assertPropertyNotWired('lazy_not_wired')
        ->assertPropertyNotWired('live_not_wired')
        ->assertPropertyNotWired('defer_not_wired')
        ->assertPropertyNotWired('debounce_not_wired')
        ->assertPropertyNotWired('lazy-with-duration_not_wired')
        ->assertPropertyNotWired('debounce-with-duration_not_wired')
        ->assertPropertyNotWired('singlequote_not_wired');
});

it('checks if Livewire property is entangled to a field', function () {
    Livewire::test(LivewireTestComponentA::class)
        ->assertPropertyEntangled('entangled-x-data-state-single-quote')
        ->assertPropertyEntangled('entangled-x-data-state-double-quote')
        ->assertPropertyEntangled('entangled-x-data-single-quote')
        ->assertPropertyEntangled('entangled-x-data-single-quote');
});

it('checks if livewire property is not entangled to a field', function () {
    Livewire::test(LivewireTestComponentA::class)
        ->assertPropertyNotEntangled('entangled-x-data-state-single-quote-not-entangled')
        ->assertPropertyNotEntangled('entangled-x-data-state-double-quote-not-entangled')
        ->assertPropertyNotEntangled('entangled-x-data-single-quote-not-entangled')
        ->assertPropertyNotEntangled('entangled-x-data-single-quote-not-entangled');
});

it('checks if livewire method is wired to a field', function () {
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
});

it('checks if livewire method is not wired to a field', function () {
    Livewire::test(LivewireTestComponentA::class)
        ->assertMethodNotWired('prevent_not_wired')
        ->assertMethodNotWired('submit_not_wired')
        ->assertMethodNotWired('singlequote_not_wired');
});

it('checks if Livewire method is wired with params to a field', function () {
    Livewire::test(LivewireTestComponentA::class)
        ->assertMethodWired('params')
        ->assertMethodWired('preventParams');
});

it('checks if Livewire method is not wired with params to a field', function () {
    Livewire::test(LivewireTestComponentA::class)
        ->assertMethodNotWired('params_not_wired')
        ->assertMethodNotWired('preventParams_not_wired');
});

it('checks if a generic Livewire method is wired to a field', function () {
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
});

it('checks if a generic Livewire method is not wired to a field', function () {
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
});

it('checks if a generic Livewire method is wired with params to a field', function () {
    Livewire::test(LivewireTestComponentD::class)
        ->assertMethodWiredToAction('mouseenter', 'params');
});

it('checks if a generic Livewire method is not wired with params to a field', function () {
    Livewire::test(LivewireTestComponentD::class)
        ->assertMethodNotWiredToAction('mouseenter', 'params_not_wired');
});

it('checks if Livewire method is wired to a form', function () {
    Livewire::test(LivewireTestComponentA::class)
        ->assertMethodWiredToForm('upload')
        ->assertMethodWiredToForm('uploadSinglequote');
});

it('checks if Livewire method is not wired to a form', function () {
    Livewire::test(LivewireTestComponentA::class)
        ->assertMethodNotWiredToForm('upload_not_wired')
        ->assertMethodNotWiredToForm('uploadSinglequote_not_wired');
});

it('checks if Livewire method is wired to a field with an event', function () {
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
});

it('checks if Livewire method is not wired to a field with an event', function () {
    Livewire::test(LivewireTestComponentA::class)
        ->assertMethodNotWiredToEvent('prevent_not_wired', 'click')
        ->assertMethodNotWiredToEvent('submit_not_wired', 'click')
        ->assertMethodNotWiredToEvent('singlequote_not_wired', 'click')
        ->assertMethodNotWiredToEvent('keyup', 'keydown')
        ->assertMethodNotWiredToEvent('keyup_not_wired', 'keyup')
        ->assertMethodNotWiredToEvent('changeDebounce', 'debounce')
        ->assertMethodNotWiredToEvent('changeDebounce_not_wired', 'change');
});

it('checks if Livewire method is wired with params to a field with an event', function () {
    Livewire::test(LivewireTestComponentA::class)
        ->assertMethodWiredToEvent('params', 'click')
        ->assertMethodWiredToEvent('preventParams', 'click')
        ->assertMethodWiredToEvent('setSelector', 'change');
});

it('checks if Livewire method is not wired with params to a field with an event', function () {
    Livewire::test(LivewireTestComponentA::class)
        ->assertMethodNotWiredToEvent('params_not_wired', 'click')
        ->assertMethodNotWiredToEvent('preventParams_not_wired', 'click')
        ->assertMethodNotWiredToEvent('setSelector_not_wired', 'change')
        ->assertMethodNotWiredToEvent('setSelector', 'click');
});

it('checks if Livewire method is wired to a field with an event without modifications', function () {
    Livewire::test(LivewireTestComponentA::class)
        ->assertMethodWiredToEventWithoutModifiers('submit', 'click')
        ->assertMethodWiredToEventWithoutModifiers('singlequote', 'click')
        ->assertMethodWiredToEventWithoutModifiers('keyup', 'keyup')
        ->assertMethodWiredToEventWithoutModifiers('keydown-page-down', 'keydown.page-down');
});

it('checks if Livewire method is not wired to a field with an event without modifiers', function () {
    Livewire::test(LivewireTestComponentA::class)
        ->assertMethodNotWiredToEventWithoutModifiers('prevent', 'click')
        ->assertMethodNotWiredToEventWithoutModifiers('prevent_not_wired', 'click')
        ->assertMethodNotWiredToEventWithoutModifiers('submit_not_wired', 'click')
        ->assertMethodNotWiredToEventWithoutModifiers('singlequote_not_wired', 'click')
        ->assertMethodNotWiredToEventWithoutModifiers('keydown-page-down', 'keydown');
});

it('checks if Livewire method is wired with params to a field with an event without modifiers', function () {
    Livewire::test(LivewireTestComponentA::class)
        ->assertMethodWiredToEventWithoutModifiers('params', 'click')
        ->assertMethodWiredToEventWithoutModifiers('preventParams', 'click.prevent')
        ->assertMethodWiredToEventWithoutModifiers('setSelector', 'change');
});

it('checks if Livewire method is not wired with params to a field with an event without modifiers', function () {
    Livewire::test(LivewireTestComponentA::class)
        ->assertMethodNotWiredToEventWithoutModifiers('params_not_wired', 'click')
        ->assertMethodNotWiredToEventWithoutModifiers('preventParams', 'click');
});

it('checks if Livewire component contains another Livewire component by class name', function () {
    Livewire::test(LivewireTestComponentA::class)
        ->assertContainsLivewireComponent(LivewireTestComponentB::class);
});

it(
    'checks if Livewire component does not contain another Livewire component by class name',
    function () {
        Livewire::test(LivewireTestComponentA::class)
            ->assertDoesNotContainLivewireComponent(NonExistantLivewireTestComponent::class);
});

it('checks if Livewire component contains another Livewire component by component name', function () {
    Livewire::test(LivewireTestComponentA::class)
        ->assertContainsLivewireComponent('tests.components.livewire-test-component-b');
});

it('checks if Livewire component does not contain another livewire component by component name', function () {
    Livewire::test(LivewireTestComponentA::class)
        ->assertDoesNotContainLivewireComponent('non-existant-livewire-test-component');
});

it('checks if Livewire component contains a Blade component by class name', function () {
    Livewire::test(LivewireTestComponentA::class)
        ->assertContainsBladeComponent(Button::class);
});

it(
    'checks if Livewire component does not contain a Blade component by class name',
    function () {
        Livewire::test(LivewireTestComponentA::class)
            ->assertDoesNotContainBladeComponent(NonExistantButton::class);
});

it(
    'checks if Livewire component contains a Blade component by component name',
    function () {
        Livewire::test(LivewireTestComponentA::class)
            ->assertContainsBladeComponent('button');
});

it(
    'checks if Livewire component does not contain a Blade component by component name',
    function () {
        Livewire::test(LivewireTestComponentA::class)
            ->assertDoesNotContainBladeComponent('non-existant-button');
});

it('checks if it sees string before other string', function () {
     Livewire::test(LivewireTestComponentA::class)
        ->assertSeeBefore('First value', 'Second value');
});

it('checks if it does not see string before other string', function () {
    Livewire::test(LivewireTestComponentA::class)
        ->assertDoNotSeeBefore('Second value', 'First value');
});

it('checks if it sees a Blade directive', function () {
    Livewire::test(LivewireTestComponentC::class)
        ->assertContainsLivewireComponent(LivewireTestComponentA::class)
        ->assertContainsLivewireComponent(LivewireTestComponentB::class);
});

it('checks if it does not see a Blade directive', function () {
    Livewire::test(LivewireTestComponentC::class)
        ->assertDoesNotContainLivewireComponent(NonExistantLivewireTestComponent::class);
});

test('can check a downloaded file contains', function () {
    Livewire::test(FileDownloadComponent::class)
        ->call('streamDownload', 'download.txt')
        ->assertFileDownloadedContains('alpine');
});

test('can check a downloaded file does not contain', function () {
    Livewire::test(FileDownloadComponent::class)
        ->call('streamDownload', 'download.txt')
        ->assertFileDownloadedNotContains('vuejs');
});
