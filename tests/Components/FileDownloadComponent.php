<?php

namespace Tests\Components;

use Livewire\Component;
use Symfony\Component\HttpFoundation\StreamedResponse;

class FileDownloadComponent extends Component
{
    public function streamDownload($filename = null, $headers = []): StreamedResponse
    {
        return response()->streamDownload(function () {
            echo 'alpinejs';
        }, $filename, $headers);
    }

    public function render(): string
    {
        return '<div></div>';
    }
}
