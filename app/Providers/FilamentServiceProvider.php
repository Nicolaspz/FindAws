<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Filament::serving(function () {
            Filament::registerRenderHook('head.end', function () {
                return <<<'HTML'
                    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo1.ico') }}">
                HTML;
            });
        });
    }
}
