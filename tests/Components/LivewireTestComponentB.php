<?php

namespace Tests\Components;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class LivewireTestComponentB extends Component
{
    public function render(): View
    {
        return view('livewire-test-component-b');
    }
}
