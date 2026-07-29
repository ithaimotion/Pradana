@props(["type" => 'success', "title" => null, "message" => null, "errors" => []])

@php
    $styles = [
        'success' => [
            'bg' => 'bg-emerald-500/10',
            'border' => 'border-emerald-500/30',
            'text' => 'text-emerald-200',
            'iconClass' => 'text-emerald-400',
            'iconPath' => 'M5 13l4 4L19 7',
        ],
        'error' => [
            'bg' => 'bg-rose-500/10',
            'border' => 'border-rose-500/30',
            'text' => 'text-rose-200',
            'iconClass' => 'text-rose-400',
            'iconPath' => 'M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
        ],
        'info' => [
            'bg' => 'bg-sky-500/10',
            'border' => 'border-sky-500/30',
            'text' => 'text-sky-200',
            'iconClass' => 'text-sky-400',
            'iconPath' => 'M13 16h-1v-4h-1m1-4h.01',
        ],
        'warning' => [
            'bg' => 'bg-amber-500/10',
            'border' => 'border-amber-500/30',
            'text' => 'text-amber-200',
            'iconClass' => 'text-amber-400',
            'iconPath' => 'M12 8v4m0 4h.01',
        ],
    ];
    $style = $styles[$type] ?? $styles['info'];
@endphp

<div {{ $attributes->merge(["class" => "rounded-3xl p-4 border {$style['border']} {$style['bg']} shadow-xl shadow-black/20"] ) }}>
    <div class="flex gap-4">
        <div class="mt-1 flex h-11 w-11 items-center justify-center rounded-2xl bg-white/10">
            <svg class="w-5 h-5 {{ $style['iconClass'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $style['iconPath'] }}" />
            </svg>
        </div>

        <div class="min-w-0 space-y-2">
            @if($title)
                <p class="text-sm font-semibold text-white">{{ $title }}</p>
            @endif

            @if($message)
                <p class="text-sm leading-6 {{ $style['text'] }}">{{ $message }}</p>
            @endif

            @if(!empty($errors))
                <div class="mt-3 rounded-2xl border border-white/10 bg-white/5 p-3">
                    <p class="text-[11px] uppercase tracking-[0.2em] text-slate-400 mb-2">Detail</p>
                    <ul class="space-y-1 text-sm text-slate-200">
                        @foreach($errors as $error)
                            <li class="flex items-start gap-2">
                                <span class="mt-1 inline-block h-1.5 w-1.5 rounded-full bg-white/60"></span>
                                <span>{{ $error }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>
