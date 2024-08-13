<?php

namespace App\Filament\Pages\Auth;

use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Auth\Register as AuthRegister;


class Register extends AuthRegister
{
    public function form(Form $form): Form
    {
        return $form
        ->schema([
            $this->getNameFormComponent(),
            $this->getPhoneFormComponent(),
            $this->getEmailFormComponent(),
            $this->getPasswordFormComponent(),
            $this->getPasswordConfirmationFormComponent(),
        ])
        ->statePath('data');
    }

    protected function getPhoneFormComponent(): Component
    {
        return TextInput::make('phone')
            ->label(__('phone'))
            ->mask('999999999')
            ->required()
            ->maxLength(9)
            ->unique($this->getUserModel());
    }
}
