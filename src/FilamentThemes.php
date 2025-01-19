<?php

namespace Rupadana\FilamentThemes;

use Filament\Facades\Filament;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Rupadana\FilamentThemes\Themes\Contracts\Theme;
use Rupadana\FilamentThemes\Themes\Nord;
use Rupadana\FilamentThemes\Themes\Ocean;
use Rupadana\FilamentThemes\Themes\Sky;

class FilamentThemes
{
    protected ?Collection $themes = null;

    protected $enableThemeName = 'default';

    protected string $disk = 'local';

    public function __construct()
    {
        $this->themes = collect([
            Sky::make()->getName() => Sky::class,
            Ocean::make()->getName() => Ocean::class,
            Nord::make()->getName() => Nord::class,
        ]);
    }

    public static function make(): static
    {
        return new static;
    }

    public function getEnabledTheme(): Theme
    {
        $themes = app(FilamentThemes::class)->getThemes();

        if (isset($themes->toArray()[$this->enableThemeName])) {
            return app($themes->toArray()[$this->enableThemeName]);
        }

        return app($this->getThemes()->first());
    }

    public function enableTheme(string $theme = 'default')
    {
        $this->enableThemeName = $theme;

        return $this;
    }

    public function getThemes(): Collection
    {
        return $this->themes;
    }

    public function getTheme(string $theme)
    {
        return app(app(FilamentThemes::class)->getThemes()->toArray()[$theme]);
    }

    public function themes(array $themes): FilamentThemes
    {
        $this->themes = $this->themes->merge($themes);

        return $this;
    }

    public function disk(string $disk): static
    {
        $this->disk = $disk;

        return $this;
    }

    public function getDisk()
    {
        return $this->disk;
    }

    public function getStorageDisk()
    {
        return Storage::disk($this->getDisk());
    }

    public function getCurrentActivatedData()
    {
        return json_decode($this->getStorageDisk()->get('panel-' . Filament::getCurrentPanel()->getId() . '-data.json'), true) ?? [];
    }

    public function saveThemeToDisk(string $theme)
    {

        return $this->getStorageDisk()->put('panel-' . Filament::getCurrentPanel()->getId() . '-data.json', json_encode([
            ...$this->getCurrentActivatedData(),
            'theme' => $theme,
        ]));
    }
}
