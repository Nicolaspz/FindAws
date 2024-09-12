<?php

namespace Filament\Pages\Auth\PasswordReset;

use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use DanHarrin\LivewireRateLimiting\WithRateLimiting;
use Exception;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Facades\Filament;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Auth\ResetPassword as ResetPasswordNotification;
use Filament\Notifications\Notification;
use Filament\Pages\Concerns\InteractsWithFormActions;
use Filament\Pages\SimplePage;
use Filament\Support\Facades\FilamentIcon;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;

/**
 * @property Form $form
 */
class RequestPasswordReset extends SimplePage
{
    use InteractsWithFormActions;
    use WithRateLimiting;

    /**
     * @var view-string
     */
    protected static string $view = 'filament-panels::pages.auth.password-reset.request-password-reset';

    /**
     * @var array<string, mixed> | null
     */
    public ?array $data = [];

    public function mount(): void
    {
        if (Filament::auth()->check()) {
            redirect()->intended(Filament::getUrl());
        }

        $this->form->fill();
    }


    public function request()//: void
    {
        try {
            $this->rateLimit(2); // Limitar a quantidade de requisições
        } catch (TooManyRequestsException $exception) {
            Notification::make()
                ->title(__('filament-panels::pages/auth/password-reset/request-password-reset.notifications.throttled.title', [
                    'seconds' => $exception->secondsUntilAvailable,
                    'minutes' => ceil($exception->secondsUntilAvailable / 60),
                ]))
                ->body(array_key_exists('body', __('filament-panels::pages/auth/password-reset/request-password-reset.notifications.throttled') ?: []) ? __('filament-panels::pages/auth/password-reset/request-password-reset.notifications.throttled.body', [
                    'seconds' => $exception->secondsUntilAvailable,
                    'minutes' => ceil($exception->secondsUntilAvailable / 60),
                ]) : null)
                ->danger()
                ->send();

            return;
        }

        $data = $this->form->getState(); // Captura o estado do formulário

        // Buscar o usuário pelo telefone
        $user = \App\Models\User::where('phone', $data['phone'])->first();

        if (!$user) {
            // Caso o usuário não exista, exibe uma notificação de erro
            Notification::make()
                ->title('Phone number not found.')
                ->danger()
                ->send();
            return;
        }

        // Gerar uma nova senha aleatória de 8 caracteres
        $newPassword = $this->generatePassword();

        // Atualizar a senha do usuário
        $user->update([
            'password' => bcrypt($newPassword), // Criptografar a senha
        ]);

        // Tentar enviar a nova senha por SMS
        $smsSent = $this->sendSMS($data['phone'], 'Sua nova senha é: ' . $newPassword);

        if ($smsSent) {
            // Se o SMS foi enviado, notificar o sucesso
            Notification::make()
                ->title('A new password has been sent to your phone.')
                ->success()
                ->send();

            $role = $user->role; // Supondo que você tem um campo 'role' no modelo de usuário

            if ($role === 'COLABORATE') {
                return redirect()->to('colaborador/login');
            } elseif ($role === 'ADMIN') {
                return redirect()->to('admin/login');
            }
            } else {
            // Se o SMS não foi enviado, exibir notificação de erro
            Notification::make()
                ->title('Failed to send SMS. Please try again.')
                ->danger()
                ->send();

            // Permanecer na página atual
            return;
        }
    }

    /**
     * Gera uma senha aleatória de 8 caracteres.
     */
    protected function generatePassword(): string
    {
        return substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 8);
    }


    protected $apiUrl;
    protected $apiKey;
    protected $secretKey;
    protected $token;

    public function __construct()
    {
        $this->apiUrl = env('SMS_API_URL');
        $this->apiKey = env('SMS_HUB_API_KEY');
        $this->secretKey = env('SMS_HUB_SECRET_KEY');
        $this->token = null;
    }
    protected function fetchToken()
    {
        $response = Http::post('https://app.smshub.ao/api/authentication', [
            'authId' => $this->apiKey,
            'secretKey' => $this->secretKey,
        ]);

        $data = $response->json();
        $this->token = $data['data']['authToken'] ?? null;

        return $this->token;
    }

    public function sendSms($contactNo, $message)
    {
        // Remove o prefixo +244 do número de telefone e coloca em um array
        $contactNoArray = [$contactNo];

        if (!$this->token) {
            $this->fetchToken();
        }

        $response = Http::withHeaders([
            'accessToken' => $this->token,
        ])->post($this->apiUrl, [
            'contactNo' => $contactNoArray,
            'message' => $message,
            "from" => "MEUKUBICO",
        ]);

        $responseData = $response->json();
        //dd($responseData);
        // Check if the response indicates success
        if (
            $responseData['status'] == 200 &&
            isset($responseData['sms'][0]['data']['status']) &&
            $responseData['sms'][0]['data']['status'] == 1
        ) {
            return true;
        }

        return false;
    }

    public function form(Form $form): Form
    {
        return $form;
    }

    /**
     * @return array<int | string, string | Form>
     */
    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        $this->getPhoneFormComponent(),
                    ])
                    ->statePath('data'),
            ),
        ];
    }

    protected function getEmailFormComponent(): Component
    {
        return TextInput::make('email')
            ->label(__('filament-panels::pages/auth/password-reset/request-password-reset.form.email.label'))
            ->email()
            ->required()
            ->autocomplete()
            ->autofocus();
    }

    protected function getPhoneFormComponent(): Component
    {
        return TextInput::make('phone')
        ->label('Phone')
        ->required()
            ->autocomplete()
            ->autofocus()
            ->extraInputAttributes(['tabindex' => 1]);
    }

    public function loginAction(): Action
    {
        return Action::make('login')
            ->link()
            ->label(__('filament-panels::pages/auth/password-reset/request-password-reset.actions.login.label'))
            ->icon(match (__('filament-panels::layout.direction')) {
                'rtl' => FilamentIcon::resolve('panels::pages.password-reset.request-password-reset.actions.login.rtl') ?? 'heroicon-m-arrow-right',
                default => FilamentIcon::resolve('panels::pages.password-reset.request-password-reset.actions.login') ?? 'heroicon-m-arrow-left',
            })
            ->url(filament()->getLoginUrl());
    }

    public function getTitle(): string | Htmlable
    {
        return __('filament-panels::pages/auth/password-reset/request-password-reset.title');
    }

    public function getHeading(): string | Htmlable
    {
        return __('filament-panels::pages/auth/password-reset/request-password-reset.heading');
    }

    /**
     * @return array<Action | ActionGroup>
     */
    protected function getFormActions(): array
    {
        return [
            $this->getRequestFormAction(),
        ];
    }

    protected function getRequestFormAction(): Action
    {
        return Action::make('request')
            ->label(__('filament-panels::pages/auth/password-reset/request-password-reset.form.actions.request.label'))
            ->submit('request');
    }

    protected function hasFullWidthFormActions(): bool
    {
        return true;
    }
}
