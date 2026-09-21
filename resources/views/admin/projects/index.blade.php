@extends('layouts.admin')

@section('title', 'Proyek')

@section('content')
    <div class="mb-8 flex flex-wrap items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-white">Proyek</h1>
            <p class="mt-1 text-slate-400">Kelola proyek portofolio Anda.</p>
        </div>
        <a href="{{ route('admin.projects.create') }}" class="btn-primary rounded-full px-6 py-3 text-sm font-semibold text-white">+ Tambah Proyek</a>
    </div>

    <div class="glass glass-card overflow-x-auto rounded-2xl">
        <table class="w-full text-left text-sm">
            <thead>
                <tr class="border-b border-white/8 text-xs uppercase tracking-wider text-slate-500">
                    <th class="px-6 py-4">Judul</th>
                    <th class="px-6 py-4">Teknologi</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/8">
                @forelse ($projects as $project)
                    <tr class="transition hover:bg-white/3">
                        <td class="px-6 py-4">
                            <p class="font-medium text-white">{{ $project->title }}</p>
                            <p class="text-xs text-slate-500">/portofolio · urutan {{ $project->sort_order }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex max-w-xs flex-wrap gap-1.5">
                                @foreach (array_slice($project->tech_stack ?? [], 0, 3) as $tech)
                                    <span class="rounded-full bg-indigo-500/15 px-2.5 py-0.5 text-xs text-indigo-300">{{ $tech }}</span>
                                @endforeach
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            @if ($project->featured)
                                <span class="rounded-full bg-amber-500/15 px-3 py-1 text-xs font-semibold text-amber-300">★ Unggulan</span>
                            @else
                                <span class="rounded-full bg-white/8 px-3 py-1 text-xs font-semibold text-slate-300">Biasa</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <a href="{{ route('admin.projects.edit', $project) }}" class="text-indigo-300 hover:text-indigo-200">Edit</a>
                                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Hapus proyek ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-rose-400 hover:text-rose-300">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-16 text-center text-slate-500">Belum ada proyek. Klik "Tambah Proyek" untuk mulai.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection