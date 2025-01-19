<?php

namespace Rupadana\FilamentThemes;

use Filament\Support\Assets\Asset;
use Filament\Support\Facades\FilamentAsset;
use Rupadana\FilamentThemes\Themes\Contracts\Theme;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentThemesServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-themes';

    public static string $viewNamespace = 'filament-themes';

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)
            ->hasViews()
            ->hasTranslations()
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishConfigFile()
                    ->askToStarRepoOnGitHub('rupadana/filament-themes');
            });

        $configFileName = $package->shortName();

        if (file_exists($package->basePath("/../config/{$configFileName}.php"))) {
            $package->hasConfigFile();
        }

        if (file_exists($package->basePath('/../resources/lang'))) {
            $package->hasTranslations();
        }

        if (file_exists($package->basePath('/../resources/views'))) {
            $package->hasViews(static::$viewNamespace);
        }
    }

    public function packageRegistered(): void
    {
        $this->app->singleton(FilamentThemes::class, function () {
            return new FilamentThemes;
        });
    }

    public function packageBooted(): void
    {
        // Asset Registration
        FilamentAsset::register(
            $this->getAssets(),
            $this->getAssetPackageName()
        );
    }

    protected function getAssetPackageName(): ?string
    {
        return 'rupadana/filament-themes';
    }

    /**
     * @return array<Asset>
     */
    protected function getAssets(): array
    {
        if (app()->runningInConsole()) {
            return app(FilamentThemes::class)
                ->getThemes()
                ->reduce(
                    function ($assets, $theme) {
                        $asset = app($theme)
                            ->getAssets();

                        if (empty($assets)) {
                            return $asset;
                        }

                        return [
                            ...$assets,
                            ...$asset,
                        ];
                    },
                );
        }

        /**
         * @var Theme $enabledTheme
         */
        $enabledTheme = app(FilamentThemes::class)->getEnabledTheme();

        return $enabledTheme->getAssets();
    }
}
