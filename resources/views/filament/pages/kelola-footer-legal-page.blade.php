<x-filament-panels::page x-data="{ activeTab: 'privasi' }">
    <x-filament::tabs label="Kelola Footer Legal Tabs">
        <x-filament::tabs.item
            alpine-active="activeTab === 'privasi'"
            x-on:click="activeTab = 'privasi'"
            icon="heroicon-m-shield-check"
        >
            Kebijakan Privasi
        </x-filament::tabs.item>

        <x-filament::tabs.item
            alpine-active="activeTab === 'syarat'"
            x-on:click="activeTab = 'syarat'"
            icon="heroicon-m-document-text"
        >
            Syarat &amp; Ketentuan
        </x-filament::tabs.item>

        <x-filament::tabs.item
            alpine-active="activeTab === 'cookie'"
            x-on:click="activeTab = 'cookie'"
            icon="heroicon-m-finger-print"
        >
            Kebijakan Cookie
        </x-filament::tabs.item>
    </x-filament::tabs>

    {{-- === SECTION SOSIAL MEDIA – selalu muncul di bawah tabs (tidak berubah saat tab berpindah) === --}}
    <div class="mt-6">
        <form wire:submit="saveSosmed">
            {{ $this->sosmedForm }}
            <div class="mt-6 text-right">
                <x-filament::button type="submit" size="lg">Simpan Sosial Media</x-filament::button>
            </div>
        </form>
    </div>

    {{-- === SECTION LEGAL – tampil hanya sesuai tab aktif === --}}
    <div class="mt-6">
        <div x-show="activeTab === 'privasi'" x-cloak>
            <form wire:submit="savePrivasi">
                {{ $this->privasiForm }}
                <div class="mt-6 text-right">
                    <x-filament::button type="submit" size="lg">Simpan Kebijakan Privasi</x-filament::button>
                </div>
            </form>
        </div>

        <div x-show="activeTab === 'syarat'" x-cloak>
            <form wire:submit="saveSyarat">
                {{ $this->syaratForm }}
                <div class="mt-6 text-right">
                    <x-filament::button type="submit" size="lg">Simpan Syarat &amp; Ketentuan</x-filament::button>
                </div>
            </form>
        </div>

        <div x-show="activeTab === 'cookie'" x-cloak>
            <form wire:submit="saveCookie">
                {{ $this->cookieForm }}
                <div class="mt-6 text-right">
                    <x-filament::button type="submit" size="lg">Simpan Kebijakan Cookie</x-filament::button>
                </div>
            </form>
        </div>

    </div>
</x-filament-panels::page>
