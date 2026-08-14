<x-filament-panels::page>
    <div x-data="{ activeTab: 'pjt' }">
        <x-filament::tabs>
            <x-filament::tabs.item alpine-active="activeTab === 'pjt'" x-on:click="activeTab = 'pjt'">
                Daftar PJT & TT
            </x-filament::tabs.item>
            <x-filament::tabs.item alpine-active="activeTab === 'struktur'" x-on:click="activeTab = 'struktur'">
                Struktur Organisasi
            </x-filament::tabs.item>
            <x-filament::tabs.item alpine-active="activeTab === 'legalitas'" x-on:click="activeTab = 'legalitas'">
                Legalitas Perusahaan
            </x-filament::tabs.item>
            <x-filament::tabs.item alpine-active="activeTab === 'sop'" x-on:click="activeTab = 'sop'">
                Standar Operasional Prosedur
            </x-filament::tabs.item>
        </x-filament::tabs>

        <div class="mt-6">
            <div x-show="activeTab === 'pjt'">
                <form wire:submit="savePjt">
                    {{ $this->pjtForm }}
                    <div class="mt-6 text-right"><x-filament::button type="submit" color="primary">Simpan PJT & TT</x-filament::button></div>
                </form>
            </div>
            <div x-show="activeTab === 'struktur'" x-cloak>
                <form wire:submit="saveStruktur">
                    {{ $this->strukturForm }}
                    <div class="mt-6 text-right"><x-filament::button type="submit" color="primary">Simpan Struktur</x-filament::button></div>
                </form>
            </div>
            <div x-show="activeTab === 'legalitas'" x-cloak>
                <form wire:submit="saveLegalitas">
                    {{ $this->legalitasForm }}
                    <div class="mt-6 text-right"><x-filament::button type="submit" color="primary">Simpan Legalitas</x-filament::button></div>
                </form>
            </div>
            <div x-show="activeTab === 'sop'" x-cloak>
                <form wire:submit="saveSop">
                    {{ $this->sopForm }}
                    <div class="mt-6 text-right"><x-filament::button type="submit" color="primary">Simpan SOP</x-filament::button></div>
                </form>
            </div>
        </div>
    </div>
</x-filament-panels::page>
