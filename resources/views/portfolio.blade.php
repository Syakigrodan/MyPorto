@extends('layouts.app')

@section('title', 'Portofolio')
@section('meta_description', 'Kumpulan proyek yang pernah dikerjakan oleh ' . config('portfolio.name'))

@section('content')
    <section class="bg-grid relative overflow-hidden">
        <div class="blob left-[-10%] top-[-10%] h-96 w-96 bg-indigo-600/30"></div>
        <div class="blob right-[-10%] bottom-[-20%] h-96 w-96 bg-cyan-500/25"></div>

        <div class="mx-auto max-w-6xl px-5 py-16">
            <div class="mb-12 max-w-2xl reveal">
                <p class="text-sm font-semibold uppercase tracking-widest text-indigo-400">Portofolio</p>
                <h1 class="mt-2 text-4xl font-extrabold text-white sm:text-5xl">
                    Proyek yang <span class="text-gradient">Telah Dibuat</span>
                </h1>
                <p class="mt-4 text-slate-400">Beberapa karya yang pernah saya kerjakan. Arahkan kursor ke kartu untuk efek 3D.</p>
            </div>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                @forelse ($projects as $index => $project)
                    <article class="glass glass-card project-card js-tilt reveal rounded-2xl p-6" style="transition-delay:{{ ($index % 3) * 70 }}ms">
                        <div class="tilt-layer">
                            <div class="relative flex h-44 items-center justify-center overflow-hidden rounded-xl bg-gradient-to-br from-indigo-600/25 via-violet-600/20 to-cyan-500/25 text-7xl">
                                {{ ['🚀', '🛒', '📋', '📝', '📊', '🧩'][$index % 6] }}
                                @if ($project->image)
                                    <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="absolute inset-0 h-full w-full object-cover">
                                @endif
                                @if ($project->featured)
                                    <span class="absolute left-3 top-3 rounded-full bg-amber-400 px-3 py-1 text-xs font-bold text-amber-950">★ Unggulan</span>
                                @endif
                            </div>

                            <div class="mt-5 flex items-start justify-between gap-3">
                                <h2 class="text-lg font-bold text-white">{{ $project->title }}</h2>
                            </div>
                            <p class="mt-2 line-clamp-3 text-sm leading-relaxed text-slate-400">{{ $project->description }}</p>

                            <div class="mt-4 flex flex-wrap gap-2">
                                @foreach (array_slice($project->tech_stack ?? [], 0, 4) as $tech)
                                    <span class="rounded-full bg-indigo-500/15 px-3 py-1 text-xs font-medium text-indigo-300">{{ $tech }}</span>
                                @endforeach
                            </div>

                            <div class="mt-5 flex items-center gap-3">
                                @if ($project->link)
                                    <a href="{{ $project->link }}" target="_blank" rel="noopener" class="btn-primary rounded-full px-5 py-2 text-xs font-semibold text-white">
                                        Lihat →
                                    </a>
                                @endif
                                @if ($project->github)
                                    <a href="{{ $project->github }}" target="_blank" rel="noopener" class="btn-ghost rounded-full px-5 py-2 text-xs font-semibold text-white">
                                        ⌨️ GitHub
                                    </a>
                                @endif
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full py-20 text-center text-slate-400">
                        Belum ada proyek. Silakan tambahkan melalui panel admin.
                    </div>
                @endforelse
            </div>

            <div class="mt-12">
                {{ $projects->links() }}
            </div>
        </div>
    </section>
@endsection