<x-filament-widgets::widget>
    <x-filament::section>
        <form wire:submit="save">
            {{ $this->form }}

            <div class="mt-4 flex justify-end">
                <x-filament::button type="submit" color="primary">
                    Simpan Pengaturan
                </x-filament::button>
            </div>
        </form>
    </x-filament::section>
</x-filament-widgets::widget>
