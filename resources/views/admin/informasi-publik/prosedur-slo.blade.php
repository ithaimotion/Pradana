@extends('layouts.admin')

@section('title', 'Prosedur SLO - Admin')

@section('content')
<div class="p-6">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-white">Kelola: Prosedur SLO</h1>
            <p class="text-xs text-slate-400 mt-1">Kelola konten prosedur SLO dengan tab terpisah</p>
        </div>
    </div>

    @if(session('success'))
        <x-admin.alert type="success" title="Berhasil" message="{{ session('success') }}" class="mb-6" />
    @endif

    <form action="{{ route('admin.informasi-publik.prosedur-slo.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Tabs -->
        <div class="bg-slate-900/80 border border-slate-800 rounded-2xl overflow-hidden">
            <div class="flex border-b border-slate-700">
                <button type="button" onclick="showTab('pdf')" id="tab-pdf" class="tab-btn px-6 py-4 text-sm font-semibold text-orange-400 border-b-2 border-orange-400 bg-slate-800/50">
                    📄 Dokumen PDF
                </button>
                <button type="button" onclick="showTab('timeline')" id="tab-timeline" class="tab-btn px-6 py-4 text-sm font-semibold text-slate-400 border-b-2 border-transparent hover:text-white">
                    📊 Timeline
                </button>
                <button type="button" onclick="showTab('accordion')" id="tab-accordion" class="tab-btn px-6 py-4 text-sm font-semibold text-slate-400 border-b-2 border-transparent hover:text-white">
                    📋 Detail Tahapan
                </button>
                <button type="button" onclick="showTab('documents')" id="tab-documents" class="tab-btn px-6 py-4 text-sm font-semibold text-slate-400 border-b-2 border-transparent hover:text-white">
                    📁 Dokumen
                </button>
                <button type="button" onclick="showTab('faq')" id="tab-faq" class="tab-btn px-6 py-4 text-sm font-semibold text-slate-400 border-b-2 border-transparent hover:text-white">
                    ❓ FAQ
                </button>
                <button type="button" onclick="showTab('settings')" id="tab-settings" class="tab-btn px-6 py-4 text-sm font-semibold text-slate-400 border-b-2 border-transparent hover:text-white">
                    ⚙️ Pengaturan
                </button>
            </div>

            <!-- Tab Content: PDF -->
            <div id="content-pdf" class="tab-content p-6">
                <h2 class="text-lg font-bold text-white mb-6">Dokumen PDF Prosedur SLO</h2>
                
                <div class="space-y-6">
                    <div>
                        <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Upload PDF</label>
                        <input type="file" name="pdf" accept=".pdf" class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-3 text-sm text-white focus:outline-none focus:border-orange-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-orange-500 file:text-white hover:file:bg-orange-600">
                        @if($prosedur && $prosedur->path_pdf)
                            <p class="text-xs text-slate-500 mt-2">File saat ini: {{ basename($prosedur->path_pdf) }}</p>
                        @endif
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Nama Dokumen</label>
                        <input type="text" name="nama_dokumen" value="{{ $prosedur->nama_dokumen ?? 'Prosedur SLO Juli 2026' }}" class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-3 text-sm text-white focus:outline-none focus:border-orange-500" placeholder="Masukkan nama dokumen...">
                    </div>
                </div>
            </div>

            <!-- Tab Content: Timeline -->
            <div id="content-timeline" class="tab-content p-6 hidden">
                <h2 class="text-lg font-bold text-white mb-6">Timeline Proses SLO</h2>
                
                <div id="timeline-container" class="space-y-4">
                    @if($prosedur && $prosedur->timeline_steps)
                        @foreach($prosedur->timeline_steps as $index => $step)
                            <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-4">
                                <div class="flex justify-between items-start mb-3">
                                    <input type="text" name="timeline_steps[{{ $index }}][title]" value="{{ $step['title'] ?? '' }}" class="flex-1 bg-slate-950 border border-slate-700 rounded-lg px-4 py-2 text-sm text-white focus:outline-none focus:border-orange-500" placeholder="Judul tahap">
                                    <button type="button" onclick="removeTimelineItem({{ $index }})" class="ml-2 text-red-400 hover:text-red-300">✕</button>
                                </div>
                                <input type="text" name="timeline_steps[{{ $index }}][description]" value="{{ $step['description'] ?? '' }}" class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2 text-sm text-white focus:outline-none focus:border-orange-500 mb-2" placeholder="Deskripsi">
                                <input type="text" name="timeline_steps[{{ $index }}][time]" value="{{ $step['time'] ?? '' }}" class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2 text-sm text-white focus:outline-none focus:border-orange-500" placeholder="Estimasi waktu (contoh: 1-2 Hari)">
                            </div>
                        @endforeach
                    @endif
                </div>
                
                <button type="button" onclick="addTimelineItem()" class="mt-4 px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white rounded-lg text-sm font-semibold transition">
                    + Tambah Tahap
                </button>
            </div>

            <!-- Tab Content: Accordion -->
            <div id="content-accordion" class="tab-content p-6 hidden">
                <h2 class="text-lg font-bold text-white mb-6">Detail Setiap Tahapan</h2>
                
                <div id="accordion-container" class="space-y-4">
                    @if($prosedur && $prosedur->accordion_content)
                        @foreach($prosedur->accordion_content as $index => $item)
                            <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-4">
                                <div class="flex justify-between items-start mb-3">
                                    <input type="text" name="accordion_content[{{ $index }}][title]" value="{{ $item['title'] ?? '' }}" class="flex-1 bg-slate-950 border border-slate-700 rounded-lg px-4 py-2 text-sm text-white focus:outline-none focus:border-orange-500" placeholder="Judul">
                                    <button type="button" onclick="removeAccordionItem({{ $index }})" class="ml-2 text-red-400 hover:text-red-300">✕</button>
                                </div>
                                <textarea name="accordion_content[{{ $index }}][content]" rows="3" class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2 text-sm text-white focus:outline-none focus:border-orange-500 mb-2" placeholder="Deskripsi detail">{{ $item['content'] ?? '' }}</textarea>
                                <textarea name="accordion_content[{{ $index }}][documents]" rows="2" class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2 text-sm text-white focus:outline-none focus:border-orange-500 mb-2" placeholder="Dokumen yang diperlukan (pisahkan dengan koma)">{{ $item['documents'] ?? '' }}</textarea>
                                <input type="text" name="accordion_content[{{ $index }}[note]" value="{{ $item['note'] ?? '' }}" class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2 text-sm text-white focus:outline-none focus:border-orange-500" placeholder="Catatan penting">
                            </div>
                        @endforeach
                    @endif
                </div>
                
                <button type="button" onclick="addAccordionItem()" class="mt-4 px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white rounded-lg text-sm font-semibold transition">
                    + Tambah Detail
                </button>
            </div>

            <!-- Tab Content: Documents -->
            <div id="content-documents" class="tab-content p-6 hidden">
                <h2 class="text-lg font-bold text-white mb-6">Dokumen yang Diperlukan</h2>
                
                <div id="documents-container" class="space-y-4">
                    @if($prosedur && $prosedur->required_documents)
                        @foreach($prosedur->required_documents as $index => $doc)
                            <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-4">
                                <div class="flex justify-between items-start">
                                    <input type="text" name="required_documents[{{ $index }}][name]" value="{{ $doc['name'] ?? '' }}" class="flex-1 bg-slate-950 border border-slate-700 rounded-lg px-4 py-2 text-sm text-white focus:outline-none focus:border-orange-500" placeholder="Nama dokumen">
                                    <button type="button" onclick="removeDocumentItem({{ $index }})" class="ml-2 text-red-400 hover:text-red-300">✕</button>
                                </div>
                                <input type="text" name="required_documents[{{ $index }}][description]" value="{{ $doc['description'] ?? '' }}" class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2 text-sm text-white focus:outline-none focus:border-orange-500 mt-2" placeholder="Deskripsi singkat">
                            </div>
                        @endforeach
                    @endif
                </div>
                
                <button type="button" onclick="addDocumentItem()" class="mt-4 px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white rounded-lg text-sm font-semibold transition">
                    + Tambah Dokumen
                </button>
            </div>

            <!-- Tab Content: FAQ -->
            <div id="content-faq" class="tab-content p-6 hidden">
                <h2 class="text-lg font-bold text-white mb-6">Pertanyaan yang Sering Diajukan</h2>
                
                <div id="faq-container" class="space-y-4">
                    @if($prosedur && $prosedur->faq_content)
                        @foreach($prosedur->faq_content as $index => $faq)
                            <div class="bg-slate-800/50 border border-slate-700 rounded-xl p-4">
                                <div class="flex justify-between items-start mb-3">
                                    <input type="text" name="faq_content[{{ $index }}][question]" value="{{ $faq['question'] ?? '' }}" class="flex-1 bg-slate-950 border border-slate-700 rounded-lg px-4 py-2 text-sm text-white focus:outline-none focus:border-orange-500" placeholder="Pertanyaan">
                                    <button type="button" onclick="removeFaqItem({{ $index }})" class="ml-2 text-red-400 hover:text-red-300">✕</button>
                                </div>
                                <textarea name="faq_content[{{ $index }}][answer]" rows="3" class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2 text-sm text-white focus:outline-none focus:border-orange-500" placeholder="Jawaban">{{ $faq['answer'] ?? '' }}</textarea>
                            </div>
                        @endforeach
                    @endif
                </div>
                
                <button type="button" onclick="addFaqItem()" class="mt-4 px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white rounded-lg text-sm font-semibold transition">
                    + Tambah FAQ
                </button>
            </div>

            <!-- Tab Content: Settings -->
            <div id="content-settings" class="tab-content p-6 hidden">
                <h2 class="text-lg font-bold text-white mb-6">Pengaturan</h2>
                
                <div class="space-y-6">
                    <div>
                        <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Status</label>
                        <div class="flex items-center gap-4">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="is_active" value="1" {{ ($prosedur->is_active ?? true) ? 'checked' : '' }} class="w-4 h-4 text-orange-500 focus:ring-orange-500 bg-slate-800 border-slate-600">
                                <span class="text-sm text-slate-300">Aktif</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="is_active" value="0" {{ !($prosedur->is_active ?? true) ? 'checked' : '' }} class="w-4 h-4 text-orange-500 focus:ring-orange-500 bg-slate-800 border-slate-600">
                                <span class="text-sm text-slate-300">Tidak Aktif</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-end mt-6">
            <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-xl font-semibold transition shadow-lg shadow-orange-500/20">
                Simpan Semua Perubahan
            </button>
        </div>
    </form>
</div>

<script>
    function showTab(tabName) {
        // Hide all tab contents
        document.querySelectorAll('.tab-content').forEach(content => {
            content.classList.add('hidden');
        });
        
        // Remove active state from all tabs
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.remove('text-orange-400', 'border-orange-400', 'bg-slate-800/50');
            btn.classList.add('text-slate-400', 'border-transparent');
        });
        
        // Show selected tab content
        document.getElementById('content-' + tabName).classList.remove('hidden');
        
        // Add active state to selected tab
        const activeTab = document.getElementById('tab-' + tabName);
        activeTab.classList.remove('text-slate-400', 'border-transparent');
        activeTab.classList.add('text-orange-400', 'border-orange-400', 'bg-slate-800/50');
    }

    let timelineIndex = {{ $prosedur && $prosedur->timeline_steps ? count($prosedur->timeline_steps) : 0 }};
    
    function addTimelineItem() {
        const container = document.getElementById('timeline-container');
        const div = document.createElement('div');
        div.className = 'bg-slate-800/50 border border-slate-700 rounded-xl p-4';
        div.innerHTML = `
            <div class="flex justify-between items-start mb-3">
                <input type="text" name="timeline_steps[${timelineIndex}][title]" class="flex-1 bg-slate-950 border border-slate-700 rounded-lg px-4 py-2 text-sm text-white focus:outline-none focus:border-orange-500" placeholder="Judul tahap">
                <button type="button" onclick="removeTimelineItem(${timelineIndex}, this)" class="ml-2 text-red-400 hover:text-red-300">✕</button>
            </div>
            <input type="text" name="timeline_steps[${timelineIndex}][description]" class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2 text-sm text-white focus:outline-none focus:border-orange-500 mb-2" placeholder="Deskripsi">
            <input type="text" name="timeline_steps[${timelineIndex}][time]" class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2 text-sm text-white focus:outline-none focus:border-orange-500" placeholder="Estimasi waktu (contoh: 1-2 Hari)">
        `;
        container.appendChild(div);
        timelineIndex++;
    }

    function removeTimelineItem(index, element) {
        element.closest('.bg-slate-800\\/50').remove();
    }

    let accordionIndex = {{ $prosedur && $prosedur->accordion_content ? count($prosedur->accordion_content) : 0 }};
    
    function addAccordionItem() {
        const container = document.getElementById('accordion-container');
        const div = document.createElement('div');
        div.className = 'bg-slate-800/50 border border-slate-700 rounded-xl p-4';
        div.innerHTML = `
            <div class="flex justify-between items-start mb-3">
                <input type="text" name="accordion_content[${accordionIndex}][title]" class="flex-1 bg-slate-950 border border-slate-700 rounded-lg px-4 py-2 text-sm text-white focus:outline-none focus:border-orange-500" placeholder="Judul">
                <button type="button" onclick="removeAccordionItem(${accordionIndex}, this)" class="ml-2 text-red-400 hover:text-red-300">✕</button>
            </div>
            <textarea name="accordion_content[${accordionIndex}][content]" rows="3" class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2 text-sm text-white focus:outline-none focus:border-orange-500 mb-2" placeholder="Deskripsi detail"></textarea>
            <textarea name="accordion_content[${accordionIndex}][documents]" rows="2" class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2 text-sm text-white focus:outline-none focus:border-orange-500 mb-2" placeholder="Dokumen yang diperlukan (pisahkan dengan koma)"></textarea>
            <input type="text" name="accordion_content[${accordionIndex}][note]" class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2 text-sm text-white focus:outline-none focus:border-orange-500" placeholder="Catatan penting">
        `;
        container.appendChild(div);
        accordionIndex++;
    }

    function removeAccordionItem(index, element) {
        element.closest('.bg-slate-800\\/50').remove();
    }

    let documentIndex = {{ $prosedur && $prosedur->required_documents ? count($prosedur->required_documents) : 0 }};
    
    function addDocumentItem() {
        const container = document.getElementById('documents-container');
        const div = document.createElement('div');
        div.className = 'bg-slate-800/50 border border-slate-700 rounded-xl p-4';
        div.innerHTML = `
            <div class="flex justify-between items-start">
                <input type="text" name="required_documents[${documentIndex}][name]" class="flex-1 bg-slate-950 border border-slate-700 rounded-lg px-4 py-2 text-sm text-white focus:outline-none focus:border-orange-500" placeholder="Nama dokumen">
                <button type="button" onclick="removeDocumentItem(${documentIndex}, this)" class="ml-2 text-red-400 hover:text-red-300">✕</button>
            </div>
            <input type="text" name="required_documents[${documentIndex}][description]" class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2 text-sm text-white focus:outline-none focus:border-orange-500 mt-2" placeholder="Deskripsi singkat">
        `;
        container.appendChild(div);
        documentIndex++;
    }

    function removeDocumentItem(index, element) {
        element.closest('.bg-slate-800\\/50').remove();
    }

    let faqIndex = {{ $prosedur && $prosedur->faq_content ? count($prosedur->faq_content) : 0 }};
    
    function addFaqItem() {
        const container = document.getElementById('faq-container');
        const div = document.createElement('div');
        div.className = 'bg-slate-800/50 border border-slate-700 rounded-xl p-4';
        div.innerHTML = `
            <div class="flex justify-between items-start mb-3">
                <input type="text" name="faq_content[${faqIndex}][question]" class="flex-1 bg-slate-950 border border-slate-700 rounded-lg px-4 py-2 text-sm text-white focus:outline-none focus:border-orange-500" placeholder="Pertanyaan">
                <button type="button" onclick="removeFaqItem(${faqIndex}, this)" class="ml-2 text-red-400 hover:text-red-300">✕</button>
            </div>
            <textarea name="faq_content[${faqIndex}][answer]" rows="3" class="w-full bg-slate-950 border border-slate-700 rounded-lg px-4 py-2 text-sm text-white focus:outline-none focus:border-orange-500" placeholder="Jawaban"></textarea>
        `;
        container.appendChild(div);
        faqIndex++;
    }

    function removeFaqItem(index, element) {
        element.closest('.bg-slate-800\\/50').remove();
    }
</script>
@endsection
