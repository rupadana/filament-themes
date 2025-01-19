<?php

namespace Rupadana\FilamentThemes\Themes;

use Filament\Panel;
use Filament\Support\Assets\Css;
use Rupadana\FilamentThemes\Themes\Contracts\Theme;

class Nord extends Theme
{
    public function getName(): string
    {
        return 'nord';
    }

    public function register(Panel $panel): void {}

    public function getThemeDescription(): ?string
    {
        return 'Theme by Hasnayeen';
    }

    public function getThumbnails(): ?array
    {
        return [
            'https://res.cloudinary.com/rupadana/image/upload/v1705144642/Screenshot_2024-01-13_at_19.17.10_e0moks.png',
            'https://res.cloudinary.com/rupadana/image/upload/v1705144642/Screenshot_2024-01-13_at_19.17.00_exq4hn.png',
        ];
    }

    public function getAssets(): array
    {
        return [
            Css::make($this->getName(), __DIR__ . '/../../resources/dist/nord.css'),
        ];
    }
}
