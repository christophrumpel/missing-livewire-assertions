<?php

namespace Tests\Components;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class LivewireTestComponentD extends Component
{
    public function render(): View
    {
        return view('livewire-test-component-d');
    }
}
