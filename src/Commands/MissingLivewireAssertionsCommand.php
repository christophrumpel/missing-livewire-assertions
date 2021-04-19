<?php

namespace Christophrumpel\MissingLivewireAssertions\Commands;

use Illuminate\Console\Command;

class MissingLivewireAssertionsCommand extends Command
{
    public $signature = 'missing_livewire_assertions';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
