@props(['logos' => null])

@php
    $splashVideoUrl = asset('videos/splash-motion.mp4');
    $fallbackLogoUrl = asset('images/logo-pnusa.png');
@endphp

<style>
    /* Prevent body scroll during active splash screen */
    html.splash-active, body.splash-active {
        overflow: hidden !important;
        height: 100% !important;
        touch-action: none !important;
    }

    #splash-screen {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        z-index: 999999;
        background-color: #000000;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        user-select: none;
        opacity: 1;
        visibility: visible;
        transition: opacity 0.35s cubic-bezier(0.4, 0, 0.2, 1), visibility 0.35s ease;
        will-change: opacity, visibility;
    }

    #splash-screen.splash-fade-out {
        opacity: 0 !important;
        visibility: hidden !important;
        pointer-events: none !important;
    }

    /* Container for the MP4 video player */
    .splash-video-wrapper {
        position: relative;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .splash-video-element {
        max-width: 90vw;
        max-height: 85vh;
        width: auto;
        height: auto;
        object-fit: contain;
        background: transparent;
        border: none;
        outline: none;
    }

    /* Fallback image if video fails to load */
    .splash-fallback-img {
        display: none;
        max-width: 320px;
        width: 80vw;
        height: auto;
        object-fit: contain;
    }

    /* -------------------------------------------------------------
       ACCESSIBILITY: PREFERS REDUCED MOTION
       ------------------------------------------------------------- */
    @media (prefers-reduced-motion: reduce) {
        #splash-screen {
            transition: opacity 0.15s ease !important;
        }
    }
</style>

<div id="splash-screen" aria-hidden="false" role="dialog" aria-label="SLO Pradana Loading Screen">
    <div class="splash-video-wrapper">
        <video id="splash-video"
               src="{{ $splashVideoUrl }}"
               autoplay
               muted
               playsinline
               preload="auto"
               class="splash-video-element">
        </video>
        <img id="splash-fallback-img" src="{{ $fallbackLogoUrl }}" alt="SLO Pradana Logo" class="splash-fallback-img">
    </div>
</div>

<script>
    (function () {
        const FADE_OUT_DURATION = 350;
        const FULL_SPEED = 1.35;       // Speed for initial load / refresh (~3.8s)
        const MENU_SPEED = 1.15;       // Speed calibrated for exact 2.5s menu animation transition
        const MENU_ANIMATION_MS = 2450; // Exact 2.5-second menu animation window
        const FALLBACK_TIMEOUT_MS = 4500;

        const isReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        const splash = document.getElementById('splash-screen');
        const video = document.getElementById('splash-video');
        const fallbackImg = document.getElementById('splash-fallback-img');
        if (!splash || !video) return;

        // Check if this page load was triggered by menu transition
        const isFastTransition = sessionStorage.getItem('splash_fast_transition') === 'true';
        sessionStorage.removeItem('splash_fast_transition');

        function lockScroll() {
            document.documentElement.classList.add('splash-active');
            document.body.classList.add('splash-active');
        }

        function unlockScroll() {
            document.documentElement.classList.remove('splash-active');
            document.body.classList.remove('splash-active');
        }

        let isFinished = false;

        function finishSplash(customFadeMs) {
            if (isFinished) return;
            isFinished = true;

            splash.classList.add('splash-fade-out');
            unlockScroll();

            const fadeTime = customFadeMs || FADE_OUT_DURATION;
            setTimeout(function () {
                splash.style.display = 'none';
            }, fadeTime);
        }

        if (isReducedMotion) {
            finishSplash(150);
            return;
        }

        if (isFastTransition) {
            // Fast menu arrival transition: Smooth 300ms fade into destination page
            finishSplash(300);
        } else {
            // INITIAL PAGE LOAD / FULL RELOAD (Ctrl+R / F5): Play full video at 1.35x speed
            lockScroll();

            function setSpeed(rate) {
                try { video.playbackRate = rate || FULL_SPEED; } catch (e) {}
            }

            video.addEventListener('play', function () { setSpeed(FULL_SPEED); });
            video.addEventListener('loadedmetadata', function () { setSpeed(FULL_SPEED); });
            setSpeed(FULL_SPEED);

            const playPromise = video.play();
            if (playPromise !== undefined) {
                playPromise.then(function() {
                    setSpeed(FULL_SPEED);
                }).catch(function () {
                    if (fallbackImg) fallbackImg.style.display = 'block';
                    if (video) video.style.display = 'none';
                    setTimeout(function () { finishSplash(350); }, 1200);
                });
            }

            video.addEventListener('ended', function () { finishSplash(350); });
            setTimeout(function () { finishSplash(350); }, FALLBACK_TIMEOUT_MS);
        }

        // -----------------------------------------------------------------
        // EXACT 2.5-SECOND MENU TRANSITION INTERCEPTOR (FIXED SPEC)
        // -----------------------------------------------------------------
        document.addEventListener('click', function (e) {
            const link = e.target.closest('a');
            if (!link) return;

            const href = link.getAttribute('href');
            if (!href) return;

            // Ignore external links, anchor targets, hashes, or new tab links
            if (
                href.startsWith('#') ||
                href.startsWith('javascript:') ||
                href.startsWith('mailto:') ||
                href.startsWith('tel:') ||
                link.getAttribute('target') === '_blank' ||
                link.hasAttribute('download')
            ) {
                return;
            }

            // Check if link belongs to current origin (internal navigation)
            const targetUrl = new URL(link.href, window.location.origin);
            if (targetUrl.origin !== window.location.origin) {
                return;
            }

            // Don't re-trigger if clicking same exact URL path
            if (targetUrl.pathname === window.location.pathname && targetUrl.search === window.location.search) {
                return;
            }

            // EXACT 2.5-SECOND MENU ANIMATION TRANSITION
            e.preventDefault();
            lockScroll();

            sessionStorage.setItem('splash_fast_transition', 'true');
            isFinished = false;
            splash.style.display = 'flex';
            splash.classList.remove('splash-fade-out');

            // Restart video at 1.15x speed for exact 2.5-second menu animation transition!
            try {
                video.currentTime = 0;
                video.playbackRate = MENU_SPEED;
                video.play();
            } catch (err) {}

            // Cleanly navigate to destination page after exactly 2.45s (2.5s total with fade)
            setTimeout(function () {
                window.location.href = targetUrl.href;
            }, MENU_ANIMATION_MS);
        });
    })();
</script>
