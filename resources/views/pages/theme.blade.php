<?php
$filatheme = app(\Rupadana\FilamentThemes\FilamentThemes::class);
$themes = $filatheme->getThemes();
$enabledTheme = $filatheme->getEnabledTheme()->getName();

?>

<x-filament-panels::page>
    <x-filament::grid default="2" class="gap-8" md="3">

        @foreach ($themes as $theme)
            <?php
            /**
             * @var \Rupadana\FilamentThemes\Themes\Contracts\Theme $theme
             */
            $theme = app($theme);
            $isEnabled = $theme->getName() == $enabledTheme;
            ?>


            <x-filament::section>
                <x-slot name="heading">
                    {{ ucfirst($theme->getName()) }}
                </x-slot>

                <x-slot name="headerEnd">
                    <x-filament::button wire:click="enableTheme('{{ $theme->getName() }}')"
                        color="{{ $isEnabled ? 'gray' : 'primary' }}" class="cursor-pointer">
                        {{ $isEnabled ? 'Activated' : 'Enable' }}

                    </x-filament::button>
                </x-slot>

                <x-slot name="description">
                    {{ $theme->getThemeDescription() }}
                </x-slot>


                <swiper-container autoplay="true" autoplay-delay="3000" pagination="true">
                    @foreach ($theme->getThumbnails() ?? [] as $thumbnail)
                        <swiper-slide class="rounded-3xl">
                            <img src="{{ $thumbnail }}">
                        </swiper-slide>
                    @endforeach

                </swiper-container>

            </x-filament::section>
        @endforeach
    </x-filament::grid>


    <x-filament-actions::modals />

</x-filament-panels::page>
