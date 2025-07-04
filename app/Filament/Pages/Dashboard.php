<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static string $view = 'filament.pages.dashboard';

    protected static ?string $title = 'Dashboard';

    protected static ?int $navigationSort = -1; // untuk menempatkan di atas

    // ✅ Batasi hanya role administrator
    public static function canAccess(): bool
    {
        return auth()->user()?->role === 'administrator';
    }

    // ✅ (Opsional) Jangan tampilkan menu sidebar untuk non-admin
    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()?->role === 'administrator';
    }
}
