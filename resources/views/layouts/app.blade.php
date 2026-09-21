<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', config('portfolio.name')) — MyPortofolio</title>
        <meta name="description" content="@yield('meta_description', config('portfolio.tagline'))">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700,800" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen antialiased">
        @php
            $navItems = [
                ['label' => 'Beranda', 'route' => 'home', 'icon' => '🏠'],
                ['label' => 'Tentang', 'route' => 'about', 'icon' => '👤'],
                ['label' => 'Portofolio', 'route' => 'portfolio', 'icon' => '💼'],
                ['label' => 'Blog', 'route' => 'blog.index', 'icon' => '✍️'],
                ['label' => 'Kontak', 'route' => 'contact', 'icon' => '✉️'],
            ];
        @endphp

        <nav class="glass-nav fixed inset-x-0 top-0 z-50">
            <div class="mx-auto flex max-w-6xl items-center justify-between px-5 py-3.5">
                <div class="font-extrabold text-lg tracking-tight text-white">
                    <a href="{{ route('home') }}" class="flex items-center gap-2">
                        <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-gradient-to-br from-indigo-500 to-cyan-400 text-sm font-black text-white shadow-lg shadow-indigo-500/40">
                            {{ strtoupper(substr(config('portfolio.name'), 0, 1)) }}
                        </span>
                        <span>{{ config('portfolio.name') }}</span>
                    </a>
                </div>

                <div class="hidden items-center gap-1 md:flex">
                    @foreach ($navItems as $item)
                        <a href="{{ route($item['route']) }}"
                           class="{{ request()->routeIs($item['route'] . '*') ? 'text-white bg-white/10' : 'text-slate-300 hover:text-white hover:bg-white/5' }} rounded-full px-4 py-2 text-sm font-medium transition">
                            {{ $item['label'] }}
                        </a>
                    @endforeach
                </div>

                <div class="flex items-center gap-2">
                    <a href="{{ route('admin.dashboard') }}"
                       class="hidden rounded-full border border-white/15 px-4 py-2 text-sm text-slate-300 transition hover:text-white hover:border-indigo-400/60 md:inline-block">
                        Admin
                    </a>
                    <button id="nav-toggle" class="glass flex h-10 w-10 items-center justify-center rounded-xl text-white md:hidden" aria-label="Menu">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>

            <div id="nav-menu" class="hidden border-t border-white/8 px-5 py-3 md:hidden">
                @foreach ($navItems as $item)
                    <a href="{{ route($item['route']) }}"
                       class="{{ request()->routeIs($item['route'] . '*') ? 'text-white bg-white/10' : 'text-slate-300' }} block rounded-lg px-4 py-2.5 text-sm font-medium transition">
                        {{ $item['icon'] }} {{ $item['label'] }}
                    </a>
                @endforeach
                <a href="{{ route('admin.dashboard') }}" class="block rounded-lg px-4 py-2.5 text-sm text-slate-300">
                    ⚙️ Admin
                </a>
            </div>
        </nav>

        <main class="pt-16">
            @yield('content')
        </main>

        <footer class="glass-nav mt-20">
            <div class="mx-auto flex max-w-6xl flex-col items-center gap-6 px-5 py-12 md:flex-row md:justify-between">
                <div class="text-center md:text-left">
                    <p class="font-bold text-white">{{ config('portfolio.name') }}</p>
                    <p class="mt-1 text-sm text-slate-400">{{ config('portfolio.tagline') }}</p>
                </div>

                <div class="flex items-center gap-3">
                    @foreach (config('portfolio.socials') as $label => $url)
                        <a href="{{ $url }}" target="_blank" rel="noopener"
                           class="glass card-hover flex h-11 w-11 items-center justify-center rounded-xl text-slate-300 hover:text-white" title="{{ ucfirst($label) }}">
                            @if ($label === 'github')
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 .5C5.65.5.5 5.65.5 12c0 5.08 3.29 9.39 7.86 10.91.58.11.79-.25.79-.56 0-.28-.01-1.02-.02-2-3.2.7-3.87-1.54-3.87-1.54-.52-1.33-1.28-1.69-1.28-1.69-1.05-.71.08-.7.08-.7 1.16.08 1.77 1.19 1.77 1.19 1.03 1.76 2.7 1.25 3.36.96.1-.75.4-1.25.73-1.54-2.56-.29-5.25-1.28-5.25-5.7 0-1.26.45-2.29 1.19-3.1-.12-.29-.52-1.46.11-3.05 0 0 .97-.31 3.18 1.18a11.1 11.1 0 0 1 5.8 0c2.2-1.49 3.17-1.18 3.17-1.18.63 1.59.23 2.76.11 3.05.74.81 1.19 1.84 1.19 3.1 0 4.43-2.7 5.41-5.27 5.69.41.35.78 1.05.78 2.12 0 1.53-.01 2.77-.01 3.15 0 .31.21.67.8.56A10.52 10.52 0 0 0 23.5 12C23.5 5.65 18.35.5 12 .5z"/></svg>
                            @elseif ($label === 'linkedin')
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M4.98 3.5C4.98 4.88 3.87 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM.5 8h4v15.5h-4V8zm7.5 0h3.83v2.12h.05c.53-1.01 1.83-2.12 3.82-2.12 4.08 0 4.83 2.69 4.83 6.18V23.5h-4v-8.02c0-1.91-.03-4.37-2.66-4.37-2.66 0-3.07 2.08-3.07 4.23v8.16h-4V8z"/></svg>
                            @elseif ($label === 'instagram')
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.16c3.2 0 3.58.01 4.85.07 3.25.15 4.77 1.69 4.92 4.92.06 1.27.07 1.65.07 4.85s-.01 3.58-.07 4.85c-.15 3.23-1.66 4.77-4.92 4.92-1.27.06-1.64.07-4.85.07s-3.58-.01-4.85-.07c-3.26-.15-4.77-1.7-4.92-4.92C2.17 15.58 2.16 15.2 2.16 12s.01-3.58.07-4.85C2.38 3.92 3.9 2.38 7.15 2.23 8.42 2.17 8.8 2.16 12 2.16zm0 3.68a6.16 6.16 0 1 0 0 12.32 6.16 6.16 0 0 0 0-12.32zm0 10.16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zM19.85 5.59a1.44 1.44 0 1 1-2.88 0 1.44 1.44 0 0 1 2.88 0z"/></svg>
                            @elseif ($label === 'twitter')
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.9 1.15h3.68l-8.04 9.19L24 22.85h-7.41l-5.8-7.58-6.64 7.58H.47l8.6-9.83L0 1.15h7.59l5.24 6.93 6.07-6.93zm-1.29 19.5h2.04L6.49 3.24H4.3l13.31 17.41z"/></svg>
                            @elseif ($label === 'youtube')
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.5 6.19a3.02 3.02 0 0 0-2.12-2.14C19.5 3.55 12 3.55 12 3.55s-7.5 0-9.38.5A3.02 3.02 0 0 0 .5 6.19C0 8.07 0 12 0 12s0 3.93.5 5.81a3.02 3.02 0 0 0 2.12 2.14c1.88.5 9.38.5 9.38.5s7.5 0 9.38-.5a3.02 3.02 0 0 0 2.12-2.14C24 15.93 24 12 24 12s0-3.93-.5-5.81zM9.55 15.57V8.43L15.82 12l-6.27 3.57z"/></svg>
                            @else
                                <span class="text-lg">{{ ucfirst($label[0]) }}</span>
                            @endif
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="border-t border-white/8 py-5 text-center text-sm text-slate-500">
                © {{ date('Y') }} {{ config('portfolio.name') }} — Dibangun dengan Laravel ♥
            </div>
        </footer>
    </body>
</html>