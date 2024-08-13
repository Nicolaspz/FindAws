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
use Althinect\FilamentSpatieRolesPermissions\FilamentSpatieRolesPermissionsPlugin;
use App\Filament\Resources\BusinessResource;
use App\Filament\Resources\ConditionResource;
use App\Filament\Resources\DistritoResource;
use App\Filament\Resources\DocumentResource;
use App\Filament\Resources\ImageResource;
use App\Filament\Resources\MunicipioResource;
use App\Filament\Resources\PropertieResource;
use App\Filament\Resources\PropertyTypesResource;
use App\Filament\Resources\ProvinceResource;
use App\Filament\Resources\TipologiesResource;
use App\Filament\Resources\UserResource;
use App\Filament\Resources\VisitResource;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Filament\Navigation\UserMenuItem;
use Filament\Pages\Dashboard;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->sidebarCollapsibleOnDesktop(true)
            ->id('admin')
            ->path('admin')
            ->login()
            ->registration()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([

            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->plugin(FilamentSpatieRolesPermissionsPlugin::make())
            ->navigation(function (NavigationBuilder $builder): NavigationBuilder {
                return $builder->groups([
                    NavigationGroup::make()
                    ->items([
                        NavigationItem::make('Dashboard')
                        ->icon('heroicon-o-home')
                        ->isActiveWhen(fn (): bool => request()->routeIs('filament.admin.pages.dashboard'))
                        ->url(fn (): string => Dashboard::getUrl()),
                    ]),
                    NavigationGroup::make('Source')
                        ->items([

                            ...DistritoResource::getNavigationItems(),
                            ...MunicipioResource::getNavigationItems(),
                            ...ProvinceResource::getNavigationItems(),
                            ...PropertyTypesResource::getNavigationItems(),
                            ...TipologiesResource::getNavigationItems(),
                            ...VisitResource::getNavigationItems(),

                        ]),


                        NavigationGroup::make('Setting')
                        ->items([
                            ...PropertieResource::getNavigationItems(),
                            ...ImageResource::getNavigationItems(),
                            ...UserResource::getNavigationItems(),
                            NavigationItem::make('Roles')
                            ->icon('heroicon-o-user-group')
                            ->isActiveWhen(fn (): bool => request()->routeIs([
                                'filament.admin.resources.roles.index',
                                'filament.admin.resources.roles.create',
                                'filament.admin.resources.roles.view',
                                'filament.admin.resources.roles.edit'
                            ]))
                            ->url(fn (): string => '/admin/roles'),
                            NavigationItem::make('Permissions')
                            ->icon('heroicon-o-lock-closed')
                            ->isActiveWhen(fn (): bool => request()->routeIs([
                                'filament.admin.resources.permissions.index',
                                'filament.admin.resources.permissions.create',
                                'filament.admin.resources.permissions.view',
                                'filament.admin.resources.permissions.edit'
                            ]))
                            ->url(fn (): string => '/admin/permissions'),


                        ]),
                ]);
            })
            ->databaseNotifications();
    }

    public function boot(): void
    {
        Filament::serving(function(){
            Filament::registerUserMenuItems([
                UserMenuItem::make()
                ->label('settings')
                //->url(BusinessResource::getUrl())

                //->icon('heroicon-s-cog'),

                //UserMenuItem::make()
                //->label('Conditions')

               // ->url(ConditionResource::getUrl())
                //->icon('heroicon-s-cog'),
            ]);
        });
    }
}
