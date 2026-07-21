<x-filament-panels::page>
    <form wire:submit="submit" class="space-y-6">
        {{ $this->form }}

        <div style="margin-top: 1.25rem;" class="flex items-center justify-start">
            <x-filament::button type="submit" size="lg">
                Simpan Perubahan
            </x-filament::button>
        </div>
    </form>
</x-filament-panels::page>
