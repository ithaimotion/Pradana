<x-filament-panels::page>
    <div x-data="{ activeTab: 'hero' }">
        <x-filament::tabs>
            <x-filament::tabs.item
                alpine-active="activeTab === 'hero'"
                x-on:click="activeTab = 'hero'"
                icon="heroicon-m-photo"
            >
                Hero Banner
            </x-filament::tabs.item>
            

            <x-filament::tabs.item
                alpine-active="activeTab === 'tentang'"
                x-on:click="activeTab = 'tentang'"
                icon="heroicon-m-information-circle"
            >
                Tentang Pradana
            </x-filament::tabs.item>

            <x-filament::tabs.item
                alpine-active="activeTab === 'teknologi'"
                x-on:click="activeTab = 'teknologi'"
                icon="heroicon-m-cpu-chip"
            >
                Teknologi
            </x-filament::tabs.item>

            <x-filament::tabs.item
                alpine-active="activeTab === 'keunggulan'"
                x-on:click="activeTab = 'keunggulan'"
                icon="heroicon-m-star"
            >
                Keunggulan APC+
            </x-filament::tabs.item>

            <x-filament::tabs.item
                alpine-active="activeTab === 'energi'"
                x-on:click="activeTab = 'energi'"
                icon="heroicon-m-bolt"
            >
                Energi Berkelanjutan
            </x-filament::tabs.item>

            <x-filament::tabs.item
                alpine-active="activeTab === 'mengapa'"
                x-on:click="activeTab = 'mengapa'"
                icon="heroicon-m-question-mark-circle"
            >
                Mengapa Kami
            </x-filament::tabs.item>

            <x-filament::tabs.item
                alpine-active="activeTab === 'akreditasi'"
                x-on:click="activeTab = 'akreditasi'"
                icon="heroicon-m-check-badge"
            >
                Akreditasi Resmi
            </x-filament::tabs.item>

            <x-filament::tabs.item
                alpine-active="activeTab === 'sertifikat'"
                x-on:click="activeTab = 'sertifikat'"
                icon="heroicon-m-document-check"
            >
                Sertifikat Kinerja
            </x-filament::tabs.item>
        </x-filament::tabs>

        <div class="mt-6">
            <div x-show="activeTab === 'hero'">
                <form wire:submit="saveHero">
                    {{ $this->heroForm }}
                    <div class="mt-6 text-right">
                        <x-filament::button type="submit" color="primary">
                            Simpan Hero Banner
                        </x-filament::button>
                    </div>
                </form>
            </div>

            <div x-show="activeTab === 'tentang'" x-cloak>
                <form wire:submit="saveTentang">
                    {{ $this->tentangForm }}
                    <div class="mt-6 text-right">
                        <x-filament::button type="submit" color="primary">
                            Simpan Tentang Pradana
                        </x-filament::button>
                    </div>
                </form>
            </div>

            <div x-show="activeTab === 'teknologi'" x-cloak>
                <form wire:submit="saveTeknologi">
                    {{ $this->teknologiForm }}
                    <div class="mt-6 text-right">
                        <x-filament::button type="submit" color="primary">
                            Simpan Teknologi
                        </x-filament::button>
                    </div>
                </form>
            </div>

            <div x-show="activeTab === 'keunggulan'" x-cloak>
                <form wire:submit="saveKeunggulan">
                    {{ $this->keunggulanForm }}
                    <div class="mt-6 text-right">
                        <x-filament::button type="submit" color="primary">
                            Simpan Keunggulan
                        </x-filament::button>
                    </div>
                </form>
            </div>

            <div x-show="activeTab === 'energi'" x-cloak>
                <form wire:submit="saveEnergi">
                    {{ $this->energiForm }}
                    <div class="mt-6 text-right">
                        <x-filament::button type="submit" color="primary">
                            Simpan Energi Berkelanjutan
                        </x-filament::button>
                    </div>
                </form>
            </div>

            <div x-show="activeTab === 'mengapa'" x-cloak>
                <form wire:submit="saveMengapa">
                    {{ $this->mengapaForm }}
                    <div class="mt-6 text-right">
                        <x-filament::button type="submit" color="primary">
                            Simpan Mengapa Pilih Kami
                        </x-filament::button>
                    </div>
                </form>
            </div>

            <div x-show="activeTab === 'akreditasi'" x-cloak>
                <form wire:submit="saveAkreditasi">
                    {{ $this->akreditasiForm }}
                    <div class="mt-6 text-right">
                        <x-filament::button type="submit" color="primary">
                            Simpan Akreditasi
                        </x-filament::button>
                    </div>
                </form>
            </div>

            <div x-show="activeTab === 'sertifikat'" x-cloak>
                <form wire:submit="saveSertifikat">
                    {{ $this->sertifikatForm }}
                    <div class="mt-6 text-right">
                        <x-filament::button type="submit" color="primary">
                            Simpan Sertifikat
                        </x-filament::button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-filament-panels::page>
