@php
    use Filament\Support\Enums\MaxWidth;

    $livewire ??= null;
@endphp

<x-filament-panels::layout.base :livewire="$livewire">
    @props([
        'after' => null,
        'heading' => null,
        'subheading' => null,
    ])

    {{-- Glassmorphism Login Layout --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

        body,
        .fi-body {
            font-family: 'Inter', sans-serif !important;
        }

        .fi-simple-layout {
            background: linear-gradient(135deg, #0f0c29 0%, #1a1a4e 30%, #1e3a5f 60%, #0d2137 100%) !important;
            min-height: 100vh !important;
            position: relative !important;
            overflow: hidden !important;
        }

        /* Animated background orbs */
        .fi-simple-layout::before {
            content: '';
            position: fixed;
            top: -30%;
            left: -20%;
            width: 70vw;
            height: 70vw;
            background: radial-gradient(circle, rgba(21, 93, 252, 0.25) 0%, transparent 70%);
            border-radius: 50%;
            animation: floatOrb1 12s ease-in-out infinite alternate;
            pointer-events: none;
            z-index: 0;
        }

        .fi-simple-layout::after {
            content: '';
            position: fixed;
            bottom: -30%;
            right: -20%;
            width: 60vw;
            height: 60vw;
            background: radial-gradient(circle, rgba(99, 179, 237, 0.18) 0%, transparent 70%);
            border-radius: 50%;
            animation: floatOrb2 15s ease-in-out infinite alternate;
            pointer-events: none;
            z-index: 0;
        }

        @keyframes floatOrb1 {
            0%   { transform: translate(0, 0) scale(1); }
            100% { transform: translate(8vw, 6vw) scale(1.15); }
        }

        @keyframes floatOrb2 {
            0%   { transform: translate(0, 0) scale(1); }
            100% { transform: translate(-6vw, -8vw) scale(1.2); }
        }

        /* Extra decorative orb in center-right */
        .fi-simple-main-ctn {
            position: relative;
            z-index: 1;
        }

        .fi-simple-main-ctn::before {
            content: '';
            position: fixed;
            top: 30%;
            right: 10%;
            width: 35vw;
            height: 35vw;
            background: radial-gradient(circle, rgba(139, 92, 246, 0.15) 0%, transparent 70%);
            border-radius: 50%;
            animation: floatOrb3 18s ease-in-out infinite alternate;
            pointer-events: none;
        }

        @keyframes floatOrb3 {
            0%   { transform: translate(0, 0) scale(1); }
            100% { transform: translate(-5vw, 5vw) scale(1.1); }
        }

        /* Glassmorphism Card */
        .fi-simple-main {
            background: rgba(255, 255, 255, 0.07) !important;
            backdrop-filter: blur(24px) !important;
            -webkit-backdrop-filter: blur(24px) !important;
            border: 1px solid rgba(255, 255, 255, 0.15) !important;
            border-radius: 24px !important;
            box-shadow:
                0 32px 64px rgba(0, 0, 0, 0.4),
                0 0 0 1px rgba(255, 255, 255, 0.05),
                inset 0 1px 0 rgba(255, 255, 255, 0.15) !important;
            padding: 3rem 3rem !important;
            position: relative;
            overflow: hidden;
        }

        /* Shimmer top line */
        .fi-simple-main::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
        }

        /* Logo / Brand area */
        .fi-logo {
            opacity: 1 !important;
            filter: drop-shadow(0 4px 16px rgba(0, 0, 0, 0.4)) !important;
            display: block !important;
            margin: 0 auto 0.5rem auto !important;
            transform: scale(1.6) !important;
            transform-origin: center center !important;
        }

        .fi-simple-header-logo {
            margin-bottom: 1.5rem !important;
        }

        /* Headings */
        .fi-simple-header {
            text-align: center !important;
        }

        .fi-heading {
            color: #ffffff !important;
            font-size: 1.75rem !important;
            font-weight: 700 !important;
            letter-spacing: -0.025em !important;
            text-shadow: 0 2px 20px rgba(0, 0, 0, 0.3) !important;
        }

        .fi-subheading {
            color: rgba(203, 213, 225, 0.85) !important;
            font-size: 0.95rem !important;
            font-weight: 400 !important;
            margin-top: 0.35rem !important;
        }

        /* Form Labels */
        .fi-fo-field-wrp label,
        .fi-label,
        label.fi-label {
            color: rgba(226, 232, 240, 0.9) !important;
            font-weight: 500 !important;
            font-size: 0.875rem !important;
        }

        /* Input Fields */
        .fi-input,
        .fi-fo-text-input input,
        input[type="email"],
        input[type="password"],
        input[type="text"] {
            background: rgba(255, 255, 255, 0.08) !important;
            border: 1px solid rgba(255, 255, 255, 0.15) !important;
            border-radius: 10px !important;
            color: #ffffff !important;
            transition: all 0.3s ease !important;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.2) !important;
        }

        .fi-input:focus,
        .fi-fo-text-input input:focus {
            background: rgba(255, 255, 255, 0.12) !important;
            border-color: rgba(99, 162, 255, 0.6) !important;
            box-shadow:
                0 0 0 3px rgba(21, 93, 252, 0.2),
                inset 0 1px 3px rgba(0, 0, 0, 0.15) !important;
            outline: none !important;
        }

        .fi-input::placeholder,
        .fi-fo-text-input input::placeholder {
            color: rgba(148, 163, 184, 0.6) !important;
        }

        /* Input icons & suffix */
        .fi-input-wrp .fi-input-affix-ctn svg,
        .fi-input-wrp svg {
            color: rgba(148, 163, 184, 0.7) !important;
        }

        /* Input wrapper */
        .fi-input-wrp {
            background: transparent !important;
            border: 1px solid rgba(255, 255, 255, 0.15) !important;
            border-radius: 10px !important;
            overflow: hidden;
            transition: all 0.3s ease !important;
        }

        .fi-input-wrp:focus-within {
            border-color: rgba(99, 162, 255, 0.6) !important;
            box-shadow: 0 0 0 3px rgba(21, 93, 252, 0.2) !important;
        }

        /* Password toggle button */
        .fi-input-wrp button {
            color: rgba(148, 163, 184, 0.8) !important;
        }

        .fi-input-wrp button:hover {
            color: rgba(255, 255, 255, 0.9) !important;
        }

        /* Checkbox */
        .fi-fo-checkbox input[type="checkbox"] {
            background: rgba(255, 255, 255, 0.1) !important;
            border-color: rgba(255, 255, 255, 0.2) !important;
            border-radius: 5px !important;
        }

        .fi-fo-checkbox input[type="checkbox"]:checked {
            background: #155DFC !important;
            border-color: #155DFC !important;
        }

        .fi-fo-checkbox label {
            color: rgba(203, 213, 225, 0.85) !important;
        }

        /* Submit / Login Button */
        .fi-btn-primary,
        button[type="submit"].fi-btn {
            background: linear-gradient(135deg, #155DFC 0%, #4f87ff 100%) !important;
            border: none !important;
            border-radius: 10px !important;
            color: #ffffff !important;
            font-weight: 600 !important;
            font-size: 0.95rem !important;
            padding: 0.75rem 1.5rem !important;
            width: 100% !important;
            cursor: pointer !important;
            transition: all 0.3s ease !important;
            box-shadow: 0 4px 20px rgba(21, 93, 252, 0.4) !important;
            position: relative !important;
            overflow: hidden !important;
        }

        .fi-btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.15), transparent);
            transition: left 0.5s ease;
        }

        .fi-btn-primary:hover::before {
            left: 100%;
        }

        .fi-btn-primary:hover {
            background: linear-gradient(135deg, #1a6aff 0%, #5a8fff 100%) !important;
            transform: translateY(-1px) !important;
            box-shadow: 0 8px 30px rgba(21, 93, 252, 0.5) !important;
        }

        .fi-btn-primary:active {
            transform: translateY(0) !important;
        }

        /* Validation Errors */
        .fi-fo-field-wrp-validation-error .fi-input-wrp {
            border-color: rgba(239, 68, 68, 0.6) !important;
        }

        p.fi-fo-field-wrp-error-message,
        .fi-fo-field-wrp-error-message {
            color: rgba(252, 165, 165, 0.9) !important;
            font-size: 0.8rem !important;
        }

        /* Notification toasts */
        .fi-notifications {
            z-index: 9999 !important;
        }

        /* Footer area */
        .fi-simple-layout > div:last-child {
            color: rgba(148, 163, 184, 0.6) !important;
            font-size: 0.8rem !important;
        }

        /* Dividers */
        hr, .fi-hr {
            border-color: rgba(255, 255, 255, 0.1) !important;
        }

        /* Subheading link (register etc) */
        .fi-subheading a,
        .fi-link {
            color: rgba(99, 179, 237, 0.9) !important;
            text-decoration: none !important;
            font-weight: 500 !important;
            transition: color 0.2s ease !important;
        }

        .fi-subheading a:hover,
        .fi-link:hover {
            color: #fff !important;
        }

        /* Particles / Dots overlay */
        .glassy-dots {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 0;
            overflow: hidden;
        }

        .glassy-dot {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.04);
            animation: floatDot linear infinite;
        }

        @keyframes floatDot {
            0%   { transform: translateY(100vh) scale(0); opacity: 0; }
            10%  { opacity: 1; }
            90%  { opacity: 1; }
            100% { transform: translateY(-20vh) scale(1); opacity: 0; }
        }
    </style>

    {{-- Floating particles --}}
    <div class="glassy-dots" aria-hidden="true">
        @for ($i = 0; $i < 15; $i++)
            @php
                $size   = rand(4, 20);
                $left   = rand(0, 100);
                $delay  = rand(0, 20);
                $dur    = rand(15, 35);
            @endphp
            <div class="glassy-dot" style="
                width: {{ $size }}px;
                height: {{ $size }}px;
                left: {{ $left }}%;
                animation-duration: {{ $dur }}s;
                animation-delay: {{ $delay }}s;
            "></div>
        @endfor
    </div>

    <div class="fi-simple-layout flex min-h-screen flex-col items-center">
        @if (($hasTopbar ?? true) && filament()->auth()->check())
            <div
                class="absolute end-0 top-0 flex h-16 items-center gap-x-4 pe-4 md:pe-6 lg:pe-8"
                style="z-index: 10;"
            >
                @if (filament()->hasDatabaseNotifications())
                    @livewire(Filament\Livewire\DatabaseNotifications::class, [
                        'lazy' => filament()->hasLazyLoadedDatabaseNotifications()
                    ])
                @endif

                <x-filament-panels::user-menu />
            </div>
        @endif

        <div
            class="fi-simple-main-ctn flex w-full flex-grow items-center justify-center"
        >
            <main
                @class([
                    'fi-simple-main my-16 w-full px-6 py-12 sm:px-12',
                    match ($maxWidth ??= (filament()->getSimplePageMaxContentWidth() ?? MaxWidth::Large)) {
                        MaxWidth::ExtraSmall, 'xs' => 'max-w-xs',
                        MaxWidth::Small, 'sm' => 'max-w-sm',
                        MaxWidth::Medium, 'md' => 'max-w-md',
                        MaxWidth::Large, 'lg' => 'max-w-lg',
                        MaxWidth::ExtraLarge, 'xl' => 'max-w-xl',
                        MaxWidth::TwoExtraLarge, '2xl' => 'max-w-2xl',
                        MaxWidth::ThreeExtraLarge, '3xl' => 'max-w-3xl',
                        MaxWidth::FourExtraLarge, '4xl' => 'max-w-4xl',
                        MaxWidth::FiveExtraLarge, '5xl' => 'max-w-5xl',
                        MaxWidth::SixExtraLarge, '6xl' => 'max-w-6xl',
                        MaxWidth::SevenExtraLarge, '7xl' => 'max-w-7xl',
                        MaxWidth::Full, 'full' => 'max-w-full',
                        MaxWidth::MinContent, 'min' => 'max-w-min',
                        MaxWidth::MaxContent, 'max' => 'max-w-max',
                        MaxWidth::FitContent, 'fit' => 'max-w-fit',
                        MaxWidth::Prose, 'prose' => 'max-w-prose',
                        MaxWidth::ScreenSmall, 'screen-sm' => 'max-w-screen-sm',
                        MaxWidth::ScreenMedium, 'screen-md' => 'max-w-screen-md',
                        MaxWidth::ScreenLarge, 'screen-lg' => 'max-w-screen-lg',
                        MaxWidth::ScreenExtraLarge, 'screen-xl' => 'max-w-screen-xl',
                        MaxWidth::ScreenTwoExtraLarge, 'screen-2xl' => 'max-w-screen-2xl',
                        default => $maxWidth,
                    },
                ])
            >
                {{ $slot }}
            </main>
        </div>

        {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::FOOTER, scopes: $livewire?->getRenderHookScopes()) }}
    </div>
</x-filament-panels::layout.base>
