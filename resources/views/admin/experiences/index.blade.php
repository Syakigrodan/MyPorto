@extends('layouts.admin')

@section('title', 'Pengalaman')

@section('content')
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-white">Pengalaman Kerja</h1>
        <p class="mt-1 text-slate-400">Kelola riwayat pekerjaan Anda.</p>
    </div>

    <div class="glass glass-card mb-6 rounded-2xl p-6">
        <h2 class="mb-4 text-lg font-bold text-white">+ Tambah Pengalaman</h2>
        <form action="{{ route('admin.experiences.store') }}" method="POST" class="grid grid-cols-1 gap-4 lg:grid-cols-3">
            @csrf
            <div class="space-y-3">
                <input type="text" name="company" placeholder="Nama perusahaan *" required
                       class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white transition focus:border-indigo-400/60">
                <input type="text" name="role" placeholder="Posisi *" required
                       class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white transition focus:border-indigo-400/60">
                <input type="text" name="location" placeholder="Lokasi"
                       class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white transition focus:border-indigo-400/60">
            </div>
            <div class="space-y-3">
                <input type="date" name="start_date" required
                       class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white transition focus:border-indigo-400/60 [color-scheme:dark]">
                <input type="date" name="end_date"
                       class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white transition focus:border-indigo-400/60 [color-scheme:dark]">
                <p class="text-xs text-slate-500">Kosongkan tanggal akhir jika masih berjalan.</p>
            </div>
            <div class="space-y-3">
                <textarea name="description" rows="3" placeholder="Deskripsi pekerjaan *" required
                          class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white transition focus:border-indigo-400/60"></textarea>
                <button type="submit" class="btn-primary w-full rounded-xl px-5 py-2.5 text-sm font-semibold text-white">Simpan</button>
            </div>
        </form>
        @error('company') <p class="mt-2 text-xs text-rose-400">{{ $message }}</p> @enderror
    </div>

    <div class="space-y-4">
        @forelse ($experiences as $experience)
            @php
                $formId = 'edit-exp-' . $experience->id;
                $deleteId = 'delete-exp-' . $experience->id;
            @endphp
            <form id="{{ $formId }}" action="{{ route('admin.experiences.update', $experience) }}" method="POST"></form>
            <form id="{{ $deleteId }}" action="{{ route('admin.experiences.destroy', $experience) }}" method="POST" onsubmit="return confirm('Hapus pengalaman ini?')">
                @csrf
                @method('DELETE')
            </form>

            <div class="glass glass-card rounded-2xl p-6">
                <div class="grid grid-cols-1 gap-4 lg:grid-cols-6">
                    <div class="space-y-3 lg:col-span-2">
                        <input type="text" form="{{ $formId }}" name="company" value="{{ old('company', $experience->company) }}" required
                               class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white transition focus:border-indigo-400/60">
                        <input type="text" form="{{ $formId }}" name="role" value="{{ old('role', $experience->role) }}" required
                               class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white transition focus:border-indigo-400/60">
                        <input type="text" form="{{ $formId }}" name="location" value="{{ old('location', $experience->location) }}"
                               class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white transition focus:border-indigo-400/60">
                    </div>
                    <div class="space-y-3 lg:col-span-2">
                        <input type="date" form="{{ $formId }}" name="start_date" value="{{ $experience->start_date->format('Y-m-d') }}" required
                               class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white transition focus:border-indigo-400/60 [color-scheme:dark]">
                        <input type="date" form="{{ $formId }}" name="end_date" value="{{ $experience->end_date?->format('Y-m-d') }}"
                               class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white transition focus:border-indigo-400/60 [color-scheme:dark]">
                        <input type="number" form="{{ $formId }}" name="sort_order" value="{{ old('sort_order', $experience->sort_order) }}" placeholder="Urutan"
                               class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white transition focus:border-indigo-400/60">
                    </div>
                    <div class="space-y-3 lg:col-span-2">
                        <textarea form="{{ $formId }}" name="description" rows="3" required
                                  class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-2.5 text-sm text-white transition focus:border-indigo-400/60">{{ old('description', $experience->description) }}</textarea>
                        <div class="flex items-center gap-2">
                            <button type="submit" form="{{ $formId }}" class="btn-primary flex-1 rounded-xl px-5 py-2.5 text-sm font-semibold text-white">Simpan</button>
                            <button type="submit" form="{{ $deleteId }}" class="rounded-xl px-4 py-2.5 text-sm text-rose-400 transition hover:bg-rose-500/10">Hapus</button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="glass glass-card rounded-2xl p-16 text-center text-slate-500">Belum ada pengalaman kerja.</div>
        @endforelse
    </div>
@endsection