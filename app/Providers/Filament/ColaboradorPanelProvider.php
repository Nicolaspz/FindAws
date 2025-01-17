<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Facades\Filament;

class ColaboradorPanelProvider extends PanelProvider {
    public function panel( Panel $panel ): Panel {
        return $panel
	->sidebarCollapsibleOnDesktop(true)
        ->id( 'colaborador' )
        ->path( 'colaborador' )
        ->passwordReset()
        ->profile()
        ->registration()
        ->login()
        ->colors( [
            'primary' => Color::Amber,
        ] )
        ->discoverResources( in: app_path( 'Filament/Colaborador/Resources' ), for: 'App\\Filament\\Colaborador\\Resources' )
        ->discoverPages( in: app_path( 'Filament/Colaborador/Pages' ), for: 'App\\Filament\\Colaborador\\Pages' )
        ->pages( [
            Pages\Dashboard::class,
        ] )
        ->discoverWidgets( in: app_path( 'Filament/Colaborador/Widgets' ), for: 'App\\Filament\\Colaborador\\Widgets' )
        ->widgets( [
            Widgets\AccountWidget::class,
            //Widgets\FilamentInfoWidget::class,
        ] )
        ->middleware( [
            EncryptCookies::class,
            AddQueuedCookiesToResponse::class,
            StartSession::class,
            AuthenticateSession::class,
            ShareErrorsFromSession::class,
            VerifyCsrfToken::class,
            SubstituteBindings::class,
            DisableBladeIconComponents::class,
            DispatchServingFilamentEvent::class,
        ] )
        ->authMiddleware( [
            Authenticate::class,
        ] );
    }

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
