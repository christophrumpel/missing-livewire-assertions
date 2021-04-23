<?php

namespace Christophrumpel\MissingLivewireAssertions\Tests\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public function render(): View
    {
        return view('missing-livewire-assertions::blade-test-component');
    }
}
