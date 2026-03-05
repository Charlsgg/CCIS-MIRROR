<?php

namespace App\Filament\Resources\AdminResource\Pages\Auth;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Component;
use Filament\Forms\Form;
use Filament\Pages\Auth\Register as BaseRegister;
 
class Register extends BaseRegister
{
    public function form(Form $form): Form
    {
        return $this->makeForm()
            ->schema([
                $this->getNameFormComponent(),
                $this->getEmailFormComponent(),
                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
                $this->getRoleFormComponent(), 
            ])
            ->statePath('data');
    
    }
 
    protected function getRoleFormComponent(): Component
    {
        return Select::make('role')
            ->label('Position')
            ->options([
                'IT' => 'IT Instructor',
                'IS' => 'IS instructor',
                'CS' => 'CS instructor',
                'LSG' => 'Local Student Government',
            ])
            ->default('none')
            ->required();
    }
}