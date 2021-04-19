<?php

namespace Christophrumpel\MissingLivewireAssertions;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Christophrumpel\MissingLivewireAssertions\MissingLivewireAssertions
 */
class MissingLivewireAssertionsFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'missing_livewire_assertions';
    }
}
