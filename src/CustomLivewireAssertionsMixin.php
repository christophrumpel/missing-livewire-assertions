<?php

namespace Christophrumpel\MissingLivewireAssertions;

use Closure;
use Illuminate\Support\Str;
use PHPUnit\Framework\Assert as PHPUnit;

class CustomLivewireAssertionsMixin
{
    public function assertPropertyWired(): Closure
    {
        return function (string $property) {
            PHPUnit::assertStringContainsString(
                'wire:model="'.$property.'"',
                $this->stripOutInitialData($this->lastRenderedDom)
            );

            return $this;
        };
    }

    public function assertMethodWired(): Closure
    {
        return function (string $method) {
            PHPUnit::assertStringContainsString(
                'wire:click="'.$method.'"',
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
                ->kebab()
                ->prepend('<livewire:');

            $componentHaystackView = file_get_contents($this->lastRenderedView->getPath());
            PHPUnit::assertStringContainsString($componentNeedle, $componentHaystackView);

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
}
