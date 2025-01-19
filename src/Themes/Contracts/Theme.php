<?php

namespace Rupadana\FilamentThemes\Themes\Contracts;

use Filament\Panel;

abstract class Theme
{
    abstract public function getName(): string;

    public static function make(): static
    {
        return new static;
    }

    abstract public function register(Panel $panel): void;

    abstract public function getAssets(): array;

    public function getThumbnails(): ?array
    {
        return null;
    }

    public function getThemeColor(): array
    {
        return [];
    }

    public function getThemeDescription(): ?string
    {
        return null;
    }
}
