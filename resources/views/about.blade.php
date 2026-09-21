@extends('layouts.app')

@section('title', 'Tentang Saya')
@section('meta_description', 'Profil, keahlian, dan pengalaman kerja ' . config('portfolio.name'))

@section('content')
    <section class="bg-grid relative overflow-hidden">
        <div class="blob left-[-10%] top-[-10%] h-96 w-96 bg-violet-600/30"></div>
        <div class="blob right-[-10%] bottom-[-20%] h-96 w-96 bg-indigo-600/30"></div>

        <div class="mx-auto max-w-6xl px-5 py-16">
            <div class="mb-14 max-w-2xl reveal">
                <p class="text-sm font-semibold uppercase tracking-widest text-indigo-400">Tentang Saya</p>
                <h1 class="mt-2 text-4xl font-extrabold text-white sm:text-5xl">
                    Mengenal <span class="text-gradient">Lebih Dekat</span>
                </h1>
            </div>

            <div class="grid grid-cols-1 gap-10 lg:grid-cols-5">
                <div class="lg:col-span-3">
                    <div class="glass glass-card reveal rounded-3xl p-8">
                        <div class="flex flex-col items-center gap-6 sm:flex-row">
                            <div class="flex h-28 w-28 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-indigo-500 to-cyan-400 text-5xl shadow-xl shadow-indigo-500/40">
                                {{ strtoupper(substr(config('portfolio.name'), 0, 1)) }}
                            </div>
                            <div class="text-center sm:text-left">
                                <h2 class="text-2xl font-bold text-white">{{ config('portfolio.name') }}</h2>
                                <p class="text-indigo-300">{{ config('portfolio.role') }}</p>
                                <div class="mt-3 flex items-center justify-center gap-4 text-sm text-slate-400 sm:justify-start">
                                    <span>📧 {{ config('portfolio.email') }}</span>
                                </div>
                                <div class="mt-1 flex items-center justify-center gap-4 text-sm text-slate-400 sm:justify-start">
                                    <span>📍 {{ config('portfolio.location') }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 border-t border-white/8 pt-6">
                            <h3 class="text-lg font-semibold text-white">Tentang</h3>
                            <p class="mt-3 leading-relaxed text-slate-400">{{ config('portfolio.about') }}</p>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-2">
                    <div class="glass glass-card reveal rounded-3xl p-8" style="transition-delay:100ms">
                        <h3 class="text-lg font-semibold text-white">Statistik Singkat</h3>
                        <ul class="mt-5 space-y-5">
                            <li class="flex items-center gap-4">
                                <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-indigo-500/15 text-xl">💼</span>
                                <div>
                                    <p class="text-2xl font-bold text-gradient">{{ $experiences->count() }}+</p>
                                    <p class="text-sm text-slate-400">Tahun Pengalaman</p>
                                </div>
                            </li>
                            <li class="flex items-center gap-4">
                                <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-cyan-500/15 text-xl">🚀</span>
                                <div>
                                    <p class="text-2xl font-bold text-gradient">{{ \App\Models\Project::count() }}+</p>
                                    <p class="text-sm text-slate-400">Proyek Selesai</p>
                                </div>
                            </li>
                            <li class="flex items-center gap-4">
                                <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-violet-500/15 text-xl">🛠️</span>
                                <div>
                                    <p class="text-2xl font-bold text-gradient">{{ $skills->count() }}+</p>
                                    <p class="text-sm text-slate-400">Skill Dikuasai</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-6xl px-5 py-16">
        <div class="mb-12 text-center reveal">
            <p class="text-sm font-semibold uppercase tracking-widest text-indigo-400">Kemampuan</p>
            <h2 class="mt-2 text-3xl font-extrabold text-white sm:text-4xl">Daftar Keahlian</h2>
        </div>

        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($skills as $index => $skill)
                <div class="glass glass-card js-tilt reveal rounded-2xl p-6" style="transition-delay:{{ $index * 50 }}ms">
                    <div class="tilt-layer flex items-center gap-3">
                        <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-white/5 text-2xl">{{ $skill->icon }}</span>
                        <div class="flex-1">
                            <div class="flex items-center justify-between">
                                <p class="font-semibold text-white">{{ $skill->name }}</p>
                                <p class="text-xs text-slate-400">{{ $skill->level }}%</p>
                            </div>
                            <div class="bar mt-2.5">
                                <div class="bar__fill" style="width: {{ $skill->level }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="mx-auto max-w-4xl px-5 py-16">
        <div class="mb-12 text-center reveal">
            <p class="text-sm font-semibold uppercase tracking-widest text-indigo-400">Perjalanan Karir</p>
            <h2 class="mt-2 text-3xl font-extrabold text-white sm:text-4xl">Pengalaman Kerja</h2>
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
@endsection