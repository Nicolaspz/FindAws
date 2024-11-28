<?php

namespace App\Filament\Resources\VisitResource\Widgets;

use App\Models\Propertie;
use App\Models\User;
use App\Models\Visit;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TotalVisitas extends BaseWidget
{
    protected function getStats(): array
    {
        // Consultas
        $visitasAbertas = Visit::query()->where('status', 'aberta')->count();
        $visitasFechadas = Visit::query()->where('status', 'fechada')->count();
        $totalUsuarios = User::query()->count();
        $usuariosNaoVerificados = User::query()->where('phone_verified', 0)->count();
        $totalPropiedades = Propertie::query()->count();
        $destquePropiedades = Propertie::query()->where('destaque', 1)->count();
        $publicadoPropiedades = Propertie::query()->where('publish', 1)->count();
        $NpublicadoPropiedades = Propertie::query()->where('publish', 0)->count();
        $rendaPropiedades = Propertie::query()->where('business_id', 1)->count();



        return [
            // Estatística de Visitas Abertas

            Stat::make('Total Propiedades', $totalPropiedades)
                ->color('success') // Verde
                ->icon('heroicon-o-home-modern') // Ícone de usuários
                ->description($totalPropiedades > 100 ? 'Crescimento!' : 'Estável')
                ->descriptionIcon('heroicon-s-chart-bar'), // Ícone de gráfico

            Stat::make('Propiedades a Renda', $rendaPropiedades)
            ->color('success') // Verde
            ->icon('heroicon-o-home-modern') // Ícone de usuários
            ->description($rendaPropiedades > 100 ? 'Crescimento!' : 'Estável')
            ->descriptionIcon('heroicon-s-chart-bar'), // Ícone de gráfico

            Stat::make('Propiedade em Destque', $destquePropiedades)
            ->color('success') // Verde
            ->icon('heroicon-o-home-modern') // Ícone de usuários
            ->description($destquePropiedades > 100 ? 'Crescimento!' : 'Estável')
            ->descriptionIcon('heroicon-s-chart-bar'), // Ícone de gráfico

            Stat::make('Propiedade Publicadas', $publicadoPropiedades)
            ->color('success') // Verde
            ->icon('heroicon-o-home-modern') // Ícone de usuários
            ->description($publicadoPropiedades > 100 ? 'Crescimento!' : 'Estável')
            ->descriptionIcon('heroicon-s-chart-bar'), // Ícone de gráfico

            Stat::make('heroicon-o-home-modern', $NpublicadoPropiedades)
            ->color($NpublicadoPropiedades > 0 ? 'warning' : 'success') // Laranja se > 0
            ->icon('heroicon-o-user') // Ícone de remoção de usuário
                ->description($NpublicadoPropiedades > 0 ? 'Precisa de verificação' : 'Tudo OK')
                ->descriptionIcon($NpublicadoPropiedades > 0 ? 'heroicon-s-information-circle' : 'heroicon-s-check-circle'),


            Stat::make('Visitas Abertas', $visitasAbertas)
                ->color($visitasAbertas > 0 ? 'success' : 'danger') // Verde se > 0
                ->icon('heroicon-o-eye') // Ícone de olho
                ->description($visitasAbertas > 10 ? 'Alta demanda' : 'Baixa demanda') // Texto extra
                ->descriptionIcon($visitasAbertas > 10 ? 'heroicon-s-trending-up' : 'heroicon-s-arrow-down'),

            // Estatística de Visitas Fechadas
            Stat::make('Visitas Fechadas', $visitasFechadas)
                ->color('primary') // Azul
                ->icon('heroicon-o-lock-closed') // Ícone de "cadeado fechado"
                ->description('Fechadas no período'),

            // Estatística de Total de Usuários
            Stat::make('Total Usuários', $totalUsuarios)
                ->color('success') // Verde
                ->icon('heroicon-o-users') // Ícone de usuários
                ->description($totalUsuarios > 100 ? 'Crescimento!' : 'Estável')
                ->descriptionIcon('heroicon-s-chart-bar'), // Ícone de gráfico

            // Estatística de Usuários Não Verificados
            Stat::make('Usuários Não Verificados', $usuariosNaoVerificados)
                ->color($usuariosNaoVerificados > 0 ? 'warning' : 'success') // Laranja se > 0
                ->icon('heroicon-o-user') // Ícone de remoção de usuário
                ->description($usuariosNaoVerificados > 0 ? 'Precisa de verificação' : 'Tudo OK')
                ->descriptionIcon($usuariosNaoVerificados > 0 ? 'heroicon-s-information-circle' : 'heroicon-s-check-circle'),


                
        ];
    }
}
