<?php

namespace App\Filament\Resources\AdminResource\Pages\Auth;

use App\Filament\Resources\AdminResource;
use Filament\Resources\Pages\Page;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Component;
use Filament\Forms\Form;
use Filament\Pages\Auth\Login as BaseLogin;
use DiogoGPinto\AuthUIEnhancer\Pages\Auth\Concerns\HasCustomLayout;
class CustomLogin extends BaseLogin
{
    public function form(Form $form): Form
    {
        return $this->makeForm()
            ->schema([
                $this->getEmailFormComponent(),
                $this->getPasswordFormComponent(),
                $this->getPositionFormComponent(),
                $this->getRememberFormComponent(),
            ])
            ->statePath('data');
    }
    
    protected function getPositionFormComponent(): Component
    {
        return Select::make('role')
            ->label('Position')
            ->options([
                'IT' => 'IT Instructor',
                'IS' => 'IS Instructor',
                'CS' => 'CS Instructor',
                'LSG' => 'Local Student Government',
            ])
            ->required();
    }
    
    protected function getCredentialsFromFormData(array $data): array
    {
        return [
            'email' => $data['email'],
            'password' => $data['password'],
            'role' => $data['role'],
        ];
    }
    use HasCustomLayout;
}
