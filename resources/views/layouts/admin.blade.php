<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', 'Dashboard') — Admin MyPortofolio</title>
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700,800" rel="stylesheet">
        @vite(['resources/css/admin.css', 'resources/js/admin.js'])
    </head>
    <body class="min-h-screen antialiased">
        <div class="flex min-h-screen">
            <aside class="fixed inset-y-0 left-0 z-40 hidden w-64 flex-col border-r border-white/8 bg-night lg:flex">
                <div class="flex items-center gap-2 border-b border-white/8 px-6 py-5">
                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-indigo-500 to-cyan-400 text-sm font-black text-white">
                        {{ strtoupper(substr(config('portfolio.name'), 0, 1)) }}
                    </span>
                    <div>
                        <p class="font-bold text-white">MyPortofolio</p>
                        <p class="text-xs text-slate-500">Panel Admin</p>
                    </div>
                </div>

                <nav class="flex-1 space-y-1 px-3 py-5">
                    @php
                        $adminNav = [
                            ['label' => 'Dashboard', 'route' => 'admin.dashboard', 'icon' => '📊'],
                            ['label' => 'Proyek', 'route' => 'admin.projects.index', 'icon' => '💼'],
                            ['label' => 'Sertifikat', 'route' => 'admin.certificates.index', 'icon' => '🏅'],
                            ['label' => 'Keahlian', 'route' => 'admin.skills.index', 'icon' => '🛠️'],
                        ];
                    @endphp
                    @foreach ($adminNav as $item)
                        <a href="{{ route($item['route']) }}"
                           class="{{ str_starts_with((string) request()->route()?->getName(), $item['route']) ? 'bg-indigo-500/15 text-white' : 'text-slate-400 hover:bg-white/5 hover:text-white' }} flex items-center gap-3 rounded-xl px-4 py-2.5 text-sm font-medium transition">
                            <span>{{ $item['icon'] }}</span> {{ $item['label'] }}
                        </a>
                    @endforeach
                </nav>

                <div class="space-y-2 border-t border-white/8 px-3 py-5">
                    <a href="{{ route('home') }}" class="flex items-center gap-3 rounded-xl px-4 py-2.5 text-sm text-slate-400 transition hover:bg-white/5 hover:text-white">
                        🌐 Lihat Website
                    </a>
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="flex w-full items-center gap-3 rounded-xl px-4 py-2.5 text-sm text-rose-400 transition hover:bg-rose-500/10">
                            🚪 Keluar
                        </button>
                    </form>
                </div>
            </aside>

            <div class="flex-1 lg:ml-64">
                <header class="sticky top-0 z-30 flex items-center justify-between border-b border-white/8 bg-night px-5 py-3.5 lg:hidden">
                    <p class="font-bold text-white">MyPortofolio Admin</p>
                    <a href="{{ route('home') }}" class="rounded-lg px-3 py-1.5 text-sm text-slate-400">🌐</a>
                </header>

                <main class="p-6 lg:p-10">
                    @if (session('success'))
                        <div class="mb-6 flex items-center gap-3 rounded-xl border border-emerald-400/30 bg-emerald-500/10 px-5 py-4 text-sm text-emerald-300">
                            ✅ {{ session('success') }}
                        </div>
                    @endif

                    @yield('content')
                </main>
            </div>
        </div>
    </body>
</html>