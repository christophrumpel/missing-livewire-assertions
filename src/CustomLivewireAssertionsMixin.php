<?php

namespace Christophrumpel\MissingLivewireAssertions;

use Closure;
use Illuminate\Support\Str;
use PHPUnit\Framework\Assert as PHPUnit;

/**
 * @mixin \Livewire\Testing\TestableLivewire
 */
class CustomLivewireAssertionsMixin
{
    public function assertPropertyWired(): Closure
    {
        return function (string $property) {
            PHPUnit::assertMatchesRegularExpression(
                '/wire:model(\.(live|(lazy|debounce)(\.\d+?(ms|s)|)))*=(?<q>"|\')'.$property.'(\k\'q\')/',
                $this->html()
            );

            return $this;
        };
    }

    /**
     * Assert that the given property is NOT wired
     */
    public function assertPropertyNotWired(): Closure
    {
        return function (string $property) {
            PHPUnit::assertDoesNotMatchRegularExpression(
                '/wire:model(\.(live|(lazy|debounce)(\.\d+?(ms|s)|)))*=(?<q>"|\')'.$property.'(\k\'q\')/',
                $this->html()
            );

            return $this;
        };
    }

    /**
     * Assert that the given property is entangled
     */
    public function assertPropertyEntangled(): Closure
    {
        return function (string $property) {
            $propertyRe = '('
                . preg_quote(htmlspecialchars("'" . $property . "'", ENT_QUOTES))
                . '|'
                . preg_quote(htmlspecialchars('"' . $property . '"', ENT_QUOTES))
                . '|'
                . preg_quote('"' . $property . '"')
                . '|'
                . preg_quote("'" . $property . "'")
                . ')';
            PHPUnit::assertMatchesRegularExpression(
                '/(.|\$wire\.)entangle\('.$propertyRe.'\)/',
                $this->html()
            );

            return $this;
        };
    }

    /**
     * Assert that the given property is NOT entangled
     */
    public function assertPropertyNotEntangled(): Closure
    {
        return function (string $property) {
            $propertyRe = '('
                . preg_quote(htmlspecialchars("'" . $property . "'", ENT_QUOTES))
                . '|'
                . preg_quote(htmlspecialchars('"' . $property . '"', ENT_QUOTES))
                . '|'
                . preg_quote('"' . $property . '"')
                . '|'
                . preg_quote("'" . $property . "'")
                . ')';
            PHPUnit::assertDoesNotMatchRegularExpression(
                '/(.|\$wire\.)entangle\('.$propertyRe.'\)/',
                $this->html()
            );

            return $this;
        };
    }

    /**
     * Assert that the given method is wired
     */
    public function assertMethodWired(): Closure
    {
        return function (string $method) {
            PHPUnit::assertMatchesRegularExpression(
                '/wire:click(\.(prevent))*=(?<q>"|\')'.$method.'(\s*\(.+\)\s*)?\s*(\k\'q\')/',
                $this->html()
            );

            return $this;
        };
    }

    /**
     * Assert that the given method is NOT wired
     */
    public function assertMethodNotWired(): Closure
    {
        return function (string $method) {
            PHPUnit::assertDoesNotMatchRegularExpression(
                '/wire:click(\.(prevent))*=(?<q>"|\')'.$method.'(\s*\(.+\)\s*)?\s*(\k\'q\')/',
                $this->html()
            );

            return $this;
        };
    }

    /**
     * Assert that the given method is wired to form
     */
    public function assertMethodWiredToForm(): Closure
    {
        return function (string $method) {
            PHPUnit::assertMatchesRegularExpression(
                '/wire:submit(\.(prevent))*=(?<q>"|\')'.$method.'(\k\'q\')/',
                $this->html()
            );

            return $this;
        };
    }

    /**
     * Assert that the given method is NOT wired to form
     */
    public function assertMethodNotWiredToForm(): Closure
    {
        return function (string $method) {
            PHPUnit::assertDoesNotMatchRegularExpression(
                '/wire:submit(\.(prevent))*=(?<q>"|\')'.$method.'(\k\'q\')/',
                $this->html()
            );

            return $this;
        };
    }

    /**
     * Assert that the given method is wired to the specified event
     */
    public function assertMethodWiredToEvent(): Closure
    {
        return function (string $method, string $event) {
            PHPUnit::assertMatchesRegularExpression(
                '/wire:'.preg_quote($event, '/').'(\.[a-zA-Z0-9\-]+)*=(?<q>"|\')'.$method.'(\s*\(.+\)\s*)?\s*(\k\'q\')/',
                $this->stripOutInitialData($this->lastRenderedDom)
            );

            return $this;
        };
    }

    /**
     * Assert that the given method is NOT wired to the specified event
     */
    public function assertMethodNotWiredToEvent(): Closure
    {
        return function (string $method, string $event) {
            PHPUnit::assertDoesNotMatchRegularExpression(
                '/wire:'.preg_quote($event, '/').'(\.[a-zA-Z0-9\-]+)*=(?<q>"|\')'.$method.'(\s*\(.+\)\s*)?\s*(\k\'q\')/',
                $this->stripOutInitialData($this->lastRenderedDom)
            );

            return $this;
        };
    }

    /**
     * Assert that the given method is wired to the specified event
     */
    public function assertMethodWiredToEventWithoutModifiers(): Closure
    {
        return function (string $method, string $event) {
            PHPUnit::assertMatchesRegularExpression(
                '/wire:'.preg_quote($event, '/').'=(?<q>"|\')'.$method.'(\s*\(.+\)\s*)?\s*(\k\'q\')/',
                $this->stripOutInitialData($this->lastRenderedDom)
            );

            return $this;
        };
    }

    /**
     * Assert that the given method is NOT wired to the specified event
     */
    public function assertMethodNotWiredToEventWithoutModifiers(): Closure
    {
        return function (string $method, string $event) {
            PHPUnit::assertDoesNotMatchRegularExpression(
                '/wire:'.preg_quote($event, '/').'=(?<q>"|\')'.$method.'(\s*\(.+\)\s*)?\s*(\k\'q\')/',
                $this->stripOutInitialData($this->lastRenderedDom)
            );

            return $this;
        };
    }

    /**
     * Assert that the given Livewire component is contained
     */
    public function assertContainsLivewireComponent(): Closure
    {
        return function (string $componentNeedleClass) {
            $componentNeedle = Str::of($componentNeedleClass)
                ->classBasename()
                ->kebab();

            $componentHaystackView = file_get_contents($this->lastState->getView()->getPath());

            PHPUnit::assertMatchesRegularExpression(
                '/@livewire\(\''.$componentNeedle.'\'|<livewire\:'.$componentNeedle.'/',
                $componentHaystackView
            );

            return $this;
        };
    }

    /**
     * Assert that the given Livewire component is NOT contained
     */
    public function assertDoesNotContainLivewireComponent(): Closure
    {
        return function (string $componentNeedleClass) {
            $componentNeedle = Str::of($componentNeedleClass)
                ->classBasename()
                ->kebab();

            $componentHaystackView = file_get_contents($this->lastState->getView()->getPath());

            PHPUnit::assertDoesNotMatchRegularExpression(
                '/@livewire\(\''.$componentNeedle.'\'|<livewire\:'.$componentNeedle.'/',
                $componentHaystackView
            );

            return $this;
        };
    }

    /**
     * Assert that the given Blade component is contained
     */
    public function assertContainsBladeComponent(): Closure
    {
        return function (string $componentNeedleClass) {
            $componentNeedle = Str::of($componentNeedleClass)
                ->classBasename()
                ->kebab()
                ->prepend('<x-');

            $componentHaystackView = file_get_contents($this->lastState->getView()->getPath());
            PHPUnit::assertStringContainsString($componentNeedle, $componentHaystackView);

            return $this;
        };
    }

    /**
     * Assert that the given Blade component is NOT contained
     */
    public function assertDoesNotContainBladeComponent(): Closure
    {
        return function (string $componentNeedleClass) {
            $componentNeedle = Str::of($componentNeedleClass)
                ->classBasename()
                ->kebab()
                ->prepend('<x-');

            $componentHaystackView = file_get_contents($this->lastState->getView()->getPath());
            PHPUnit::assertStringNotContainsString($componentNeedle, $componentHaystackView);

            return $this;
        };
    }

    /**
     * Assert that the given valueBefore string is before valueAfter string
     */
    public function assertSeeBefore(): Closure
    {
        return function ($valueBefore, $valueAfter) {
            $html = $this->html();
            PHPUnit::assertNotFalse($valueBeforePosition = mb_strpos($html, $valueBefore), "Value: $valueBefore not given in haystack.");
            PHPUnit::assertNotFalse($valueAfterPosition = mb_strpos($html, $valueAfter), "Value: $valueAfter not given in haystack.");

            PHPUnit::assertTrue($valueBeforePosition < $valueAfterPosition, "$valueBefore does occur before $valueAfter.");

            return $this;
        };
    }

    /**
     * Assert that the given valueBefore string is NOT before valueAfter string
     */
    public function assertDoNotSeeBefore(): Closure
    {
        return function ($valueBefore, $valueAfter) {
            $html = $this->html();
            PHPUnit::assertNotFalse($valueBeforePosition = mb_strpos($html, $valueBefore), "Value: $valueBefore not given in haystack.");
            PHPUnit::assertNotFalse($valueAfterPosition = mb_strpos($html, $valueAfter), "Value: $valueAfter not given in haystack.");

            PHPUnit::assertFalse($valueBeforePosition < $valueAfterPosition, "$valueBefore does occur before $valueAfter.");

            return $this;
        };
    }
}
