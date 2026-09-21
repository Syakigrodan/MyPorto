@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="mb-8 flex flex-wrap items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-white">Dashboard</h1>
            <p class="mt-1 text-slate-400">Selamat datang kembali! Kelola konten portofolio Anda.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
        <a href="{{ route('admin.projects.index') }}" class="glass glass-card card-hover rounded-2xl p-6">
            <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-indigo-500/15 text-2xl">💼</span>
            <p class="mt-4 text-3xl font-extrabold text-white">{{ $stats['projects'] }}</p>
            <p class="text-sm text-slate-400">Total Proyek</p>
        </a>
        <a href="{{ route('admin.posts.index') }}" class="glass glass-card card-hover rounded-2xl p-6">
            <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-cyan-500/15 text-2xl">✍️</span>
            <p class="mt-4 text-3xl font-extrabold text-white">{{ $stats['posts'] }}</p>
            <p class="text-sm text-slate-400">Total Artikel</p>
        </a>
        <a href="{{ route('admin.skills.index') }}" class="glass glass-card card-hover rounded-2xl p-6">
            <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-violet-500/15 text-2xl">🛠️</span>
            <p class="mt-4 text-3xl font-extrabold text-white">{{ $stats['skills'] }}</p>
            <p class="text-sm text-slate-400">Total Keahlian</p>
        </a>
        <a href="{{ route('admin.experiences.index') }}" class="glass glass-card card-hover rounded-2xl p-6">
            <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-500/15 text-2xl">🧑‍💻</span>
            <p class="mt-4 text-3xl font-extrabold text-white">{{ $stats['experiences'] }}</p>
            <p class="text-sm text-slate-400">Total Pengalaman</p>
        </a>
    </div>

    <div class="mt-8 grid grid-cols-1 gap-6 lg:grid-cols-2">
        <div class="glass glass-card rounded-2xl p-6">
            <div class="mb-4 flex items-center justify-between">
                <h2 class="text-lg font-bold text-white">Artikel Terbaru</h2>
                <a href="{{ route('admin.posts.create') }}" class="btn-primary rounded-full px-4 py-1.5 text-xs font-semibold text-white">+ Baru</a>
            </div>
            <div class="divide-y divide-white/8">
                @forelse ($latestPosts as $post)
                    <div class="flex items-center justify-between gap-3 py-3">
                        <div class="min-w-0">
                            <p class="truncate font-medium text-white">{{ $post->title }}</p>
                            <p class="text-xs text-slate-500">{{ $post->created_at->format('d M Y') }} · {{ $post->is_published ? 'Terbit' : 'Draft' }}</p>
                        </div>
                        <a href="{{ route('admin.posts.edit', $post) }}" class="shrink-0 text-sm text-indigo-300 hover:text-indigo-200">Edit</a>
                    </div>
                @empty
                    <p class="py-6 text-center text-sm text-slate-500">Belum ada artikel.</p>
                @endforelse
            </div>
        </div>

        <div class="glass glass-card rounded-2xl p-6">
            <div class="mb-4 flex items-center justify-between">
                <h2 class="text-lg font-bold text-white">Proyek Terbaru</h2>
                <a href="{{ route('admin.projects.create') }}" class="btn-primary rounded-full px-4 py-1.5 text-xs font-semibold text-white">+ Baru</a>
            </div>
            <div class="divide-y divide-white/8">
                @forelse ($latestProjects as $project)
                    <div class="flex items-center justify-between gap-3 py-3">
                        <div class="min-w-0">
                            <p class="truncate font-medium text-white">{{ $project->title }}</p>
                            <p class="text-xs text-slate-500">{{ $project->created_at->format('d M Y') }} · {{ $project->featured ? '★ Unggulan' : 'Biasa' }}</p>
                        </div>
                        <a href="{{ route('admin.projects.edit', $project) }}" class="shrink-0 text-sm text-indigo-300 hover:text-indigo-200">Edit</a>
                    </div>
                @empty
                    <p class="py-6 text-center text-sm text-slate-500">Belum ada proyek.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection