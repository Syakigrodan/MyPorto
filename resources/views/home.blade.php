@extends('layouts.app')

@section('content')
    @php
        $heroCubeIcons = ['🐘', '⚛️', '🎨', '⚡', '🔥', '☕'];
        $skillsSample = $skills;
    @endphp

    {{-- ============ HERO ============ --}}
    <section class="bg-grid relative overflow-hidden">
        <div class="blob left-[10%] top-[-10%] h-96 w-96 bg-indigo-600/40" style="animation-delay:0s"></div>
        <div class="blob right-[5%] top-[20%] h-80 w-80 bg-cyan-500/30" style="animation-delay:-4s"></div>
        <div class="blob left-[40%] bottom-[-20%] h-96 w-96 bg-violet-600/30" style="animation-delay:-8s"></div>

        <div class="mx-auto flex min-h-[88vh] max-w-6xl flex-col items-center gap-16 px-5 py-16 lg:flex-row lg:justify-between">
            <div class="max-w-xl text-center lg:text-left">
                <p class="mb-4 inline-flex items-center gap-2 rounded-full border border-indigo-400/30 bg-indigo-500/10 px-4 py-1.5 text-sm text-indigo-300 reveal">
                    <span class="relative flex h-2 w-2">
                        <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex h-2 w-2 rounded-full bg-emerald-400"></span>
                    </span>
                    Terbuka untuk kesempatan kolaborasi
                </p>

                <h1 class="text-4xl font-extrabold leading-tight tracking-tight text-white reveal sm:text-6xl">
                    Halo, saya
                    <span class="text-gradient">{{ config('portfolio.name') }}</span>
                </h1>
                <p class="mt-3 text-2xl font-semibold text-slate-200 reveal sm:text-3xl" style="transition-delay:80ms">
                    {{ config('portfolio.role') }}
                </p>
                <p class="mt-5 max-w-lg text-base leading-relaxed text-slate-400 reveal sm:text-lg" style="transition-delay:160ms">
                    {{ config('portfolio.tagline') }}
                </p>

                <div class="mt-8 flex flex-wrap items-center justify-center gap-4 reveal lg:justify-start" style="transition-delay:240ms">
                    <a href="{{ route('portfolio') }}" class="btn-primary rounded-full px-7 py-3.5 text-sm font-semibold text-white">
                        Lihat Portofolio →
                    </a>
                    <a href="{{ route('contact') }}" class="btn-ghost rounded-full px-7 py-3.5 text-sm font-semibold text-white">
                        Hubungi Saya
                    </a>
                </div>

                <div class="mt-10 flex flex-wrap items-center justify-center gap-6 text-sm text-slate-400 reveal lg:justify-start" style="transition-delay:320ms">
                    <div class="flex items-center gap-2">
                        <span class="text-xl">📧</span> {{ config('portfolio.email') }}
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-xl">📍</span> {{ config('portfolio.location') }}
                    </div>
                </div>
            </div>

            {{-- 3D Cube --}}
            <div class="reveal relative flex items-center justify-center" style="transition-delay:300ms">
                <div class="animate-float cube-scene">
                    <div class="cube">
                        @foreach ($heroCubeIcons as $icon)
                            <div class="cube__face cube__face--{{ ['front', 'back', 'right', 'left', 'top', 'bottom'][$loop->index] }}">
                                {{ $icon }}
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="glass animate-float absolute -left-10 top-4 rounded-2xl px-4 py-2.5 text-sm font-semibold text-white" style="animation-delay:-1.5s">
                    ⚡ Cepat & Modern
                </div>
                <div class="glass animate-float absolute -right-8 bottom-10 rounded-2xl px-4 py-2.5 text-sm font-semibold text-white" style="animation-delay:-3s">
                    🚀 Responsif
                </div>
                <div class="glass animate-float absolute -bottom-2 left-6 rounded-2xl px-4 py-2.5 text-sm font-semibold text-white" style="animation-delay:-2s">
                    ✅ Kualitas Terbaik
                </div>
            </div>
        </div>

        <div class="h-16 w-full bg-gradient-to-b from-transparent to-night"></div>
    </section>

    {{-- ============ SKILLS ============ --}}
    <section class="relative mx-auto max-w-6xl px-5 py-20">
        <div class="mb-12 text-center reveal">
            <p class="text-sm font-semibold uppercase tracking-widest text-indigo-400">Keahlian</p>
            <h2 class="mt-2 text-3xl font-extrabold text-white sm:text-4xl">Teknologi yang Saya Kuasai</h2>
            <div class="mx-auto mt-3 h-1 w-24 rounded-full bg-gradient-to-r from-indigo-500 to-cyan-400"></div>
        </div>

        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($skills as $index => $skill)
                <div class="glass glass-card js-tilt reveal rounded-2xl p-6" style="transition-delay:{{ $index * 60 }}ms">
                    <div class="tilt-layer flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-white/5 text-2xl">{{ $skill->icon }}</span>
                            <div>
                                <p class="font-semibold text-white">{{ $skill->name }}</p>
                                <p class="text-xs text-slate-400">{{ $skill->level }}% mahir</p>
                            </div>
                        </div>
                    </div>
                    <div class="bar mt-5">
                        <div class="bar__fill" style="width: {{ $skill->level }}%"></div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- ============ FEATURED PROJECTS ============ --}}
    @if ($projects->isNotEmpty())
        <section class="relative mx-auto max-w-6xl px-5 py-20">
            <div class="mb-12 flex flex-col items-center justify-between gap-4 reveal sm:flex-row">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-widest text-indigo-400">Karya Terbaik</p>
                    <h2 class="mt-2 text-3xl font-extrabold text-white">Proyek Unggulan</h2>
                </div>
                <a href="{{ route('portfolio') }}" class="btn-ghost rounded-full px-5 py-2.5 text-sm font-medium text-white">
                    Lihat Semua →
                </a>
            </div>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($projects as $index => $project)
                    <article class="glass glass-card project-card js-tilt reveal rounded-2xl p-6" style="transition-delay:{{ $index * 70 }}ms">
                        <div class="tilt-layer">
                            <div class="flex h-40 items-center justify-center rounded-xl bg-gradient-to-br from-indigo-600/25 via-violet-600/20 to-cyan-500/25 text-6xl">
                                {{ ['🚀', '🛒', '📋', '📝', '📊', '🧩'][$loop->index % 6] }}
                            </div>
                            <div class="mt-5 flex items-start justify-between gap-3">
                                <h3 class="text-lg font-bold text-white">{{ $project->title }}</h3>
                                <span class="mt-1 shrink-0 text-2xl">↗</span>
                            </div>
                            <p class="mt-2 line-clamp-3 text-sm leading-relaxed text-slate-400">{{ $project->description }}</p>
                            <div class="mt-4 flex flex-wrap gap-2">
                                @foreach (array_slice($project->tech_stack ?? [], 0, 4) as $tech)
                                    <span class="rounded-full bg-indigo-500/15 px-3 py-1 text-xs font-medium text-indigo-300">{{ $tech }}</span>
                                @endforeach
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
    @endif

    {{-- ============ EXPERIENCE ============ --}}
    @if ($experiences->isNotEmpty())
        <section class="relative mx-auto max-w-4xl px-5 py-20">
            <div class="mb-12 text-center reveal">
                <p class="text-sm font-semibold uppercase tracking-widest text-indigo-400">Perjalanan Karir</p>
                <h2 class="mt-2 text-3xl font-extrabold text-white sm:text-4xl">Pengalaman Kerja</h2>
                <div class="mx-auto mt-3 h-1 w-24 rounded-full bg-gradient-to-r from-indigo-500 to-cyan-400"></div>
            </div>

            <div class="relative border-l-2 border-indigo-500/30 pl-8">
                @foreach ($experiences as $index => $experience)
                    <div class="reveal relative pb-12" style="transition-delay:{{ $index * 80 }}ms">
                        <span class="absolute -left-[41px] flex h-5 w-5 items-center justify-center rounded-full border-2 border-indigo-400 bg-night">
                            <span class="h-2 w-2 rounded-full bg-gradient-to-r from-indigo-400 to-cyan-400"></span>
                        </span>
                        <div class="glass glass-card card-hover rounded-2xl p-6">
                            <div class="flex flex-wrap items-center justify-between gap-2">
                                <h3 class="text-lg font-bold text-white">{{ $experience->role }}</h3>
                                <span class="rounded-full bg-cyan-500/15 px-3 py-1 text-xs font-semibold text-cyan-300">
                                    {{ $experience->start_date->format('M Y') }} — {{ $experience->end_date?->format('M Y') ?? 'Sekarang' }}
                                </span>
                            </div>
                            <p class="mt-1 text-sm font-semibold text-indigo-300">
                                {{ $experience->company }} <span class="font-normal text-slate-500">· {{ $experience->location }}</span>
                            </p>
                            <p class="mt-3 text-sm leading-relaxed text-slate-400">{{ $experience->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    {{-- ============ BLOG PREVIEW ============ --}}
    @if ($posts->isNotEmpty())
        <section class="relative mx-auto max-w-6xl px-5 py-20">
            <div class="mb-12 flex flex-col items-center justify-between gap-4 reveal sm:flex-row">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-widest text-indigo-400">Catatan</p>
                    <h2 class="mt-2 text-3xl font-extrabold text-white">Artikel Terbaru</h2>
                </div>
                <a href="{{ route('blog.index') }}" class="btn-ghost rounded-full px-5 py-2.5 text-sm font-medium text-white">
                    Baca Semua →
                </a>
            </div>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                @foreach ($posts as $index => $post)
                    <a href="{{ route('blog.show', $post) }}" class="glass glass-card card-hover reveal rounded-2xl p-6" style="transition-delay:{{ $index * 70 }}ms">
                        <div class="flex h-36 items-center justify-center rounded-xl bg-gradient-to-br from-indigo-600/20 via-cyan-500/15 to-violet-600/20 text-5xl">
                            {{ ['💡', '🚀', '⚙️', '🎨'][$loop->index % 4] }}
                        </div>
                        <p class="mt-5 text-xs text-slate-500">{{ $post->published_at->format('d M Y') }}</p>
                        <h3 class="mt-1.5 line-clamp-2 text-lg font-bold leading-snug text-white">{{ $post->title }}</h3>
                        <p class="mt-2 line-clamp-2 text-sm text-slate-400">{{ $post->excerpt }}</p>
                        <p class="mt-4 text-sm font-semibold text-indigo-300">Baca Selengkapnya →</p>
                    </a>
                @endforeach
            </div>
        </section>
    @endif

    {{-- ============ CTA ============ --}}
    <section class="relative mx-auto max-w-6xl px-5 pb-10">
        <div class="glass glass-card reveal relative overflow-hidden rounded-3xl p-10 text-center sm:p-14">
            <div class="blob left-[-5%] top-[-40%] h-72 w-72 bg-indigo-600/40"></div>
            <div class="blob bottom-[-40%] right-[-5%] h-72 w-72 bg-cyan-500/30"></div>
            <div class="relative">
                <h2 class="text-3xl font-extrabold text-white">Punya Proyek Menarik?</h2>
                <p class="mx-auto mt-3 max-w-xl text-slate-400">Mari wujudkan ide Anda menjadi produk digital yang benar-benar berkesan.</p>
                <a href="{{ route('contact') }}" class="btn-primary mt-8 inline-block rounded-full px-8 py-4 text-sm font-semibold text-white">
                    Mulai Percakapan →
                </a>
            </div>
        </div>
    </section>
@endsection