<?php

namespace Rupadana\FilamentThemes\Themes;

use Filament\Panel;
use Filament\Support\Assets\Css;
use Filament\Support\Colors\Color;
use Rupadana\FilamentThemes\Themes\Contracts\Theme;

class Ocean extends Theme
{
    const Ocean = 'ocean';

    public function getName(): string
    {
        return 'ocean';
    }

    public function register(Panel $panel): void
    {
        $panel->colors([
            'primary' => Color::Orange,
        ]);
    }

    public function getAssets(): array
    {
        return [
            Css::make($this->getName(), __DIR__ . '/../../resources/dist/ocean.css'),
        ];
    }
}
