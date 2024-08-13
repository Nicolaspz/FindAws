<?php

namespace App\Filament\Pages\Auth;

use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Auth\Login as AuthLogin;
use Filament\Pages\Page;

class Login extends AuthLogin
{

    public function form(Form $form): Form
    {
        return $form
        ->schema([
            $this->getPhoneFormComponent(),
            $this->getPasswordFormComponent(),
            //$this->getRememberFormComponent(),
        ])
        ->statePath('data');
    }

    protected function getPhoneFormComponent(): Component
    {
        return TextInput::make('phone')
            ->label('email/Phone')
            ->required()
            ->autocomplete()
            ->autofocus()
            ->extraInputAttributes(['tabindex' => 1]);
    }

}
