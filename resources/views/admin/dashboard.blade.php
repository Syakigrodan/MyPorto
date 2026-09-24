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
        <a href="{{ route('admin.certificates.index') }}" class="glass glass-card card-hover rounded-2xl p-6">
            <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-orange-500/15 text-2xl">🏅</span>
            <p class="mt-4 text-3xl font-extrabold text-white">{{ $stats['certificates'] }}</p>
            <p class="text-sm text-slate-400">Total Sertifikat</p>
        </a>
        <a href="{{ route('admin.skills.index') }}" class="glass glass-card card-hover rounded-2xl p-6">
            <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-violet-500/15 text-2xl">🛠️</span>
            <p class="mt-4 text-3xl font-extrabold text-white">{{ $stats['skills'] }}</p>
            <p class="text-sm text-slate-400">Total Keahlian</p>
        </a>
        <div class="glass glass-card rounded-2xl p-6">
            <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-500/15 text-2xl">✉️</span>
            <p class="mt-4 text-3xl font-extrabold text-white">{{ $stats['contacts'] }}</p>
            <p class="text-sm text-slate-400">Pesan Kontak</p>
        </div>
    </div>

    <div class="mt-8 grid grid-cols-1 gap-6 lg:grid-cols-2">
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
                            <p class="text-xs text-slate-500">{{ $project->year ?? $project->created_at->format('Y') }} · {{ ($project->category ?? 'Project') }}</p>
                        </div>
                        <a href="{{ route('admin.projects.edit', $project) }}" class="shrink-0 text-sm text-indigo-300 hover:text-indigo-200">Edit</a>
                    </div>
                @empty
                    <p class="py-6 text-center text-sm text-slate-500">Belum ada proyek.</p>
                @endforelse
            </div>
        </div>

        <div class="glass glass-card rounded-2xl p-6">
            <div class="mb-4 flex items-center justify-between">
                <h2 class="text-lg font-bold text-white">Sertifikat Terbaru</h2>
                <a href="{{ route('admin.certificates.create') }}" class="btn-primary rounded-full px-4 py-1.5 text-xs font-semibold text-white">+ Baru</a>
            </div>
            <div class="divide-y divide-white/8">
                @forelse ($latestCertificates as $certificate)
                    <div class="flex items-center justify-between gap-3 py-3">
                        <div class="min-w-0">
                            <p class="truncate font-medium text-white">{{ $certificate->title }}</p>
                            <p class="text-xs text-slate-500">{{ $certificate->issuer }} · {{ $certificate->issued_date?->format('d M Y') }}</p>
                        </div>
                        <a href="{{ route('admin.certificates.edit', $certificate) }}" class="shrink-0 text-sm text-indigo-300 hover:text-indigo-200">Edit</a>
                    </div>
                @empty
                    <p class="py-6 text-center text-sm text-slate-500">Belum ada sertifikat.</p>
                @endforelse
            </div>
        </div>
    <div class="glass glass-card rounded-2xl p-6 sm:col-span-2">
            <div class="mb-4 flex items-center justify-between">
                <h2 class="text-lg font-bold text-white">Pesan Kontak Terbaru</h2>
            </div>
            <div class="divide-y divide-white/8">
                @forelse ($latestContacts as $contact)
                    <div class="py-3">
                        <div class="flex items-center justify-between gap-3">
                            <div class="min-w-0">
                                <p class="truncate font-medium text-white">{{ $contact->name }}
                                    <span class="text-xs font-normal text-slate-500">· {{ $contact->email }}</span>
                                </p>
                                <p class="mt-0.5 line-clamp-2 text-sm text-slate-400">{{ $contact->message }}</p>
                            </div>
                            <span class="shrink-0 text-xs text-slate-500">{{ $contact->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                @empty
                    <p class="py-6 text-center text-sm text-slate-500">Belum ada pesan.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection