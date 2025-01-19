<?php

namespace Rupadana\FilamentThemes\Themes;

use Filament\Panel;
use Filament\Support\Assets\Css;
use Filament\Support\Colors\Color;
use Rupadana\FilamentThemes\Themes\Contracts\Theme;

class Sky extends Theme
{
    const Sky = 'sky';

    public function getName(): string
    {
        return 'sky';
    }

    public function register(Panel $panel): void
    {
        $panel->colors([
            'primary' => Color::Blue,
        ]);
    }

    public function getThemeDescription(): ?string
    {
        return 'Theme by Hasnayeen';
    }

    public function getThumbnails(): ?array
    {
        return [
            'https://res.cloudinary.com/rupadana/image/upload/v1705136211/Screenshot_2024-01-13_at_16.56.03_eunbnl.png',
            'https://res.cloudinary.com/rupadana/image/upload/v1705136211/Screenshot_2024-01-13_at_16.56.13_gv7yed.png',
        ];
    }

    public function getAssets(): array
    {
        return [
            Css::make($this->getName(), __DIR__ . '/../../resources/dist/sky.css'),
        ];
    }
}
