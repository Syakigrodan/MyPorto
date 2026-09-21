@extends('layouts.admin')

@section('title', 'Keahlian')

@section('content')
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-white">Keahlian</h1>
        <p class="mt-1 text-slate-400">Kelola daftar skill yang ditampilkan di halaman beranda dan tentang.</p>
    </div>

    <div class="glass glass-card mb-6 rounded-2xl p-6">
        <h2 class="mb-4 text-lg font-bold text-white">+ Tambah Keahlian</h2>
        <form action="{{ route('admin.skills.store') }}" method="POST" class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
            @csrf
            <input type="text" name="name" placeholder="Nama skill *" required
                   class="rounded-xl border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white transition focus:border-indigo-400/60">
            <input type="text" name="icon" placeholder="Ikon (emoji)" maxlength="10"
                   class="rounded-xl border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white transition focus:border-indigo-400/60">
            <input type="number" name="level" placeholder="Level 0-100" min="0" max="100" required
                   class="rounded-xl border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white transition focus:border-indigo-400/60">
            <button type="submit" class="btn-primary rounded-xl px-5 py-2.5 text-sm font-semibold text-white">Simpan</button>
        </form>
        @error('name') <p class="mt-2 text-xs text-rose-400">{{ $message }}</p> @enderror
    </div>

    <div class="glass glass-card overflow-x-auto rounded-2xl">
        <table class="w-full text-left text-sm">
            <thead>
                <tr class="border-b border-white/8 text-xs uppercase tracking-wider text-slate-500">
                    <th class="px-6 py-4">Ikon</th>
                    <th class="px-6 py-4">Nama</th>
                    <th class="px-6 py-4">Level</th>
                    <th class="px-6 py-4">Urutan</th>
                    <th class="px-6 py-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/8">
                @forelse ($skills as $skill)
                    @php
                        $formId = 'edit-skill-' . $skill->id;
                        $deleteId = 'delete-skill-' . $skill->id;
                    @endphp
                    <tr class="transition hover:bg-white/3">
                        <td class="px-4 py-2">
                            <form id="{{ $formId }}" action="{{ route('admin.skills.update', $skill) }}" method="POST"></form>
                            <input type="text" form="{{ $formId }}" name="icon" value="{{ old('icon', $skill->icon) }}" maxlength="10"
                                   class="w-16 rounded-lg border border-white/10 bg-white/5 px-2 py-2 text-center text-lg">
                        </td>
                        <td class="px-4 py-2">
                            <input type="text" form="{{ $formId }}" name="name" value="{{ old('name', $skill->name) }}" required
                                   class="w-full min-w-40 rounded-lg border border-white/10 bg-white/5 px-3 py-2 text-sm text-white">
                        </td>
                        <td class="px-4 py-2">
                            <input type="number" form="{{ $formId }}" name="level" value="{{ old('level', $skill->level) }}" min="0" max="100" required
                                   class="w-20 rounded-lg border border-white/10 bg-white/5 px-3 py-2 text-center text-sm text-white">
                        </td>
                        <td class="px-4 py-2">
                            <input type="number" form="{{ $formId }}" name="sort_order" value="{{ old('sort_order', $skill->sort_order) }}"
                                   class="w-20 rounded-lg border border-white/10 bg-white/5 px-3 py-2 text-center text-sm text-white">
                        </td>
                        <td class="px-4 py-2">
                            <div class="flex items-center gap-2">
                                <button type="submit" form="{{ $formId }}" class="rounded-lg bg-indigo-500/20 px-3 py-2 text-xs font-semibold text-indigo-200 hover:bg-indigo-500/30">Simpan</button>
                                <form id="{{ $deleteId }}" action="{{ route('admin.skills.destroy', $skill) }}" method="POST" onsubmit="return confirm('Hapus skill ini?')">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button type="submit" form="{{ $deleteId }}" class="rounded-lg px-2 py-2 text-xs text-rose-400 hover:text-rose-300">Hapus</button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-16 text-center text-slate-500">Belum ada keahlian.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection