<x-filament-panels::page>
    <form wire:submit="save">
        {{ $this->form }}

        <div class="mt-6 mb-8">
            <x-filament::button type="submit" color="primary">
                Simpan Gambar
            </x-filament::button>
        </div>
    </form>

    {{ $this->table }}
</x-filament-panels::page>
