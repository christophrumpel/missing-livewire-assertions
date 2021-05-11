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
                '/wire:model(\.(defer|(lazy|debounce)(\.\d+?(ms|s)|)))*="'.$property.'"/',
                $this->stripOutInitialData($this->lastRenderedDom)
            );

            return $this;
        };
    }

    public function assertMethodWired(): Closure
    {
        return function (string $method) {
            PHPUnit::assertMatchesRegularExpression(
                '/wire:click(\.(prevent))*="'.$method.'"/',
                $this->stripOutInitialData($this->lastRenderedDom)
            );

            return $this;
        };
    }

    public function assertContainsLivewireComponent(): Closure
    {
        return function (string $componentNeedleClass) {
            $componentNeedle = Str::of($componentNeedleClass)
                ->classBasename()
                ->kebab();

            $componentHaystackView = file_get_contents($this->lastRenderedView->getPath());

            PHPUnit::assertMatchesRegularExpression(
                '/@livewire\(\''.$componentNeedle.'\'|<livewire\:'.$componentNeedle.'/',
                $componentHaystackView
            );

            return $this;
        };
    }

    public function assertContainsBladeComponent(): Closure
    {
        return function (string $componentNeedleClass) {
            $componentNeedle = Str::of($componentNeedleClass)
                ->classBasename()
                ->kebab()
                ->prepend('<x-');

            $componentHaystackView = file_get_contents($this->lastRenderedView->getPath());
            PHPUnit::assertStringContainsString($componentNeedle, $componentHaystackView);

            return $this;
        };
    }

    public function assertSeeBefore(): Closure
    {
        return function ($valueBefore, $valueAfter) {
            $html = $this->stripOutInitialData($this->lastRenderedDom);
            PHPUnit::assertNotFalse($valueBeforePosition = mb_strpos($html, $valueBefore), "Value: $valueBefore not given in haystack.");
            PHPUnit::assertNotFalse($valueAfterPosition = mb_strpos($html, $valueAfter), "Value: $valueAfter not given in haystack.");

            PHPUnit::assertTrue($valueBeforePosition < $valueAfterPosition, "$valueBefore does occur before $valueAfter.");

            return $this;
        };
    }
}
