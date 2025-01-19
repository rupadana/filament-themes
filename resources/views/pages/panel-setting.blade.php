<x-filament-panels::page>

    <form wire:submit="create">
        {{ $this->form }}

        <x-filament::button size="lg" type="submit" style="margin-top:20px">
            Submit
        </x-filament::button>
    </form>

    <x-filament-actions::modals />

</x-filament-panels::page>
