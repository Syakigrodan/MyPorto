@extends('layouts.admin')

@section('title', 'Artikel')

@section('content')
    <div class="mb-8 flex flex-wrap items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-white">Artikel</h1>
            <p class="mt-1 text-slate-400">Kelola artikel blog Anda.</p>
        </div>
        <a href="{{ route('admin.posts.create') }}" class="btn-primary rounded-full px-6 py-3 text-sm font-semibold text-white">+ Tulis Artikel</a>
    </div>

    <div class="glass glass-card overflow-x-auto rounded-2xl">
        <table class="w-full text-left text-sm">
            <thead>
                <tr class="border-b border-white/8 text-xs uppercase tracking-wider text-slate-500">
                    <th class="px-6 py-4">Judul</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Tanggal Terbit</th>
                    <th class="px-6 py-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/8">
                @forelse ($posts as $post)
                    <tr class="transition hover:bg-white/3">
                        <td class="px-6 py-4">
                            <p class="font-medium text-white">{{ $post->title }}</p>
                            <p class="text-xs text-slate-500">/blog/{{ $post->slug }}</p>
                        </td>
                        <td class="px-6 py-4">
                            @if ($post->is_published)
                                <span class="rounded-full bg-emerald-500/15 px-3 py-1 text-xs font-semibold text-emerald-300">Terbit</span>
                            @else
                                <span class="rounded-full bg-amber-500/15 px-3 py-1 text-xs font-semibold text-amber-300">Draft</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-slate-400">{{ $post->published_at?->format('d M Y') ?? '-' }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <a href="{{ route('admin.posts.edit', $post) }}" class="text-indigo-300 hover:text-indigo-200">Edit</a>
                                <a href="{{ route('blog.show', $post) }}" target="_blank" class="text-slate-400 hover:text-white">Lihat</a>
                                <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Hapus artikel ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-rose-400 hover:text-rose-300">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-16 text-center text-slate-500">Belum ada artikel. Klik "Tulis Artikel" untuk mulai.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection