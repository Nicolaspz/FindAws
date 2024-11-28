<?php

namespace App\Observers;

use Filament\Notifications\Notification;
use App\Models\User;
use App\Models\Visit;

class VisitaObserver
{
    /**
     * Handle the Visit "created" event.
     */
    public function created(Visit $visit)
    {
        // 1. Proprietário da casa
        $propertyOwner = $visit->propertie->users; // Supondo que a propriedade tem um relacionamento com o usuário (proprietário)

        // 2. Administradores do sistema
        $admins = User::where('role', 'ADMIN')->get(); // Filtra todos os usuários com o papel 'admin'

        // 3. Criar a notificação
        $notificationTitle = 'Nova Visita Registrada';
        $notificationMessage = "A visita para a propriedade com referencia: {$visit->propertie->reference} foi registrada.";

        // Enviar a notificação para o proprietário
            Notification::make()
            ->title($notificationTitle)
            ->body($notificationMessage)
            ->sendToDatabase($propertyOwner)
            ->send();

        // Enviar a notificação para os administradores
        foreach ($admins as $admin) {
                Notification::make()
                ->title($notificationTitle)
                ->body($notificationMessage)
                ->sendToDatabase($admin)
                ->send();
        }
    }

    /**
     * Handle the Visit "updated" event.
     */
    public function updated(Visit $visit): void
    {
        //
    }

    /**
     * Handle the Visit "deleted" event.
     */
    public function deleted(Visit $visit): void
    {
        //
    }

    /**
     * Handle the Visit "restored" event.
     */
    public function restored(Visit $visit): void
    {
        //
    }

    /**
     * Handle the Visit "force deleted" event.
     */
    public function forceDeleted(Visit $visit): void
    {
        //
    }
}
