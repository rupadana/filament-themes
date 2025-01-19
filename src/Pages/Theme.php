<?php

namespace Rupadana\FilamentThemes\Pages;

use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Rupadana\FilamentThemes\FilamentThemes;

class Theme extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament-themes::pages.theme';

    protected FilamentThemes $filamentThemes;

    public static function getNavigationGroup(): string
    {

        return config('filament-themes.navigation.group');
    }

    public function enableTheme(string $theme = 'default')
    {
        if (app(FilamentThemes::class)->getEnabledTheme()->getName() == $theme) {

            Notification::make()
                ->title('Theme already enabled')
                ->info()
                ->send();

            return;
        }

        $this->filamentThemes->saveThemeToDisk($theme);

        Notification::make()
            ->title('Theme successfully enabled')
            ->success()
            ->send();

        return $this->redirect(route('filament.admin.pages.theme'));
    }

    public function boot()
    {
        $this->filamentThemes = app(FilamentThemes::class);
    }
}
