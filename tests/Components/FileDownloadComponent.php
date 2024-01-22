<?php

namespace Christophrumpel\MissingLivewireAssertions\Tests\Components;

use Livewire\Component;

class FileDownloadComponent extends Component
{
    public function streamDownload($filename = null, $headers = [])
    {
        return response()->streamDownload(function () {
            echo 'alpinejs';
        }, $filename, $headers);
    }

    public function render()
    {
        return '<div></div>';
    }
}
