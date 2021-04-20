<?php

namespace Christophrumpel\MissingLivewireAssertions\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{

    public function render(): View
    {
        return view('missing_livewire_assertions::blade-test-component');
    }
}
