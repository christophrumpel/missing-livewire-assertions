<?php

namespace Tests\Components;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class ConfiguredNamespaceParentComponent extends Component
{
    public function render(): View
    {
        return view('configured-namespace-parent-component');
    }
}
