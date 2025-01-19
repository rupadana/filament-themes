<?php

namespace Rupadana\FilamentThemes;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Illuminate\Support\Facades\Storage;
use Rupadana\FilamentThemes\Pages\Theme as PagesTheme;

class FilamentThemesPlugin implements Plugin
{
    public function getId(): string
    {
        return 'filament-themes';
    }

    public function register(Panel $panel): void
    {
        $data = Storage::disk('local')->get('panel-' . $panel->getId() . '-data.json');
        $data = json_decode($data, true) ?? [];

        $panel->pages([
            PagesTheme::class,
        ]);

        if (isset($data['theme'])) {
            app(FilamentThemes::class)->enableTheme($data['theme']);
        }

        app(FilamentThemes::class)->getEnabledTheme()->register($panel);
    }

    public function enableTheme(string $theme = 'default')
    {
        app(FilamentThemes::class)->enableTheme($theme);

        return $this;
    }

    public function registerThemes(array $themes = [])
    {
        app(FilamentThemes::class)->themes($themes);

        return $this;
    }

    public function boot(Panel $panel): void
    {
        //
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }
}
