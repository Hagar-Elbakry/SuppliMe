@props([
    'code' => 'Error',
    'title' => 'Error',
    'subtitle' => '',
    'heading' => '',
    'message' => '',
])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        .glow-green { background: rgba(16, 185, 129, 0.3); filter: blur(3rem); }
        .glow-emerald { background: rgba(4, 120, 87, 0.3); filter: blur(3rem); }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 text-white">
    <section class="relative isolate grid min-h-screen place-items-center overflow-hidden px-6 py-24">
        <div class="pointer-events-none absolute -left-32 -top-28 h-96 w-96 rounded-full glow-green"></div>
        <div class="pointer-events-none absolute -right-32 -bottom-28 h-96 w-96 rounded-full glow-emerald"></div>

        <div class="container relative max-w-4xl text-center">
            <!-- Error Code -->
            <div class="relative mx-auto w-full max-w-3xl">
                <div class="relative">
                    <div class="relative z-10 select-none text-[8rem] font-extrabold sm:text-[10rem] md:text-[12rem]">
                        <span class="bg-gradient-to-b from-emerald-300 to-emerald-600 bg-clip-text text-transparent">
                            {{ $code }}
                        </span>
                    </div>

                    <!-- Decorative SVG -->
                    <svg class="absolute left-1/2 top-1/2 z-0 -translate-x-1/2 -translate-y-1/2"
                            viewBox="0 0 900 400" width="100%" height="320" aria-hidden="true">
                        <defs>
                            <linearGradient id="g1" x1="0" x2="1" y1="0" y2="1">
                                <stop offset="0%" stop-color="#0b3b2e" />
                                <stop offset="100%" stop-color="#0a1f1a" />
                            </linearGradient>
                        </defs>
                        <path d="M40 250c40-40 160-70 220-60s120 60 200 66 160-34 232-30 128 50 148 74l-8 10H52Z"
                                fill="url(#g1)" opacity="0.9"/>
                        <ellipse cx="450" cy="320" rx="280" ry="30" fill="#000" opacity="0.25"/>
                        <g opacity="0.95">
                            <path d="M120 250c10-40 30-70 40-70s10 20 0 40-15 30-40 30Z" fill="#10b981"/>
                            <path d="M160 250c8-30 22-52 30-52s8 15 0 30-12 22-30 22Z" fill="#34d399"/>
                            <path d="M690 245c8-35 28-60 38-60s10 18 0 34-14 26-38 26Z" fill="#10b981"/>
                            <path d="M720 250c6-22 18-38 24-38s6 12 0 22-9 16-24 16Z" fill="#34d399"/>
                        </g>
                    </svg>
                </div>
            </div>

            <p class="mt-6 text-sm font-semibold tracking-widest text-emerald-300">{{ $subtitle }}</p>
            <h1 class="mt-1 text-2xl font-bold text-white/90 sm:text-3xl">{{ $heading }}</h1>
            <p class="mx-auto mt-3 max-w-2xl text-white/70">{{ $message }}</p>

            <div class="mt-8 flex items-center justify-center gap-3">
                <a href="/" class="px-6 py-3 bg-emerald-600 text-white rounded-lg text-lg hover:bg-emerald-500 transition">
                    Back to homepage
                </a>
            </div>
        </div>
    </section>


</body>
</html>
