@extends('layouts.admin')

@section('title', 'Sertifikat')

@section('content')
    <div class="mb-8 flex flex-wrap items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-white">Sertifikat</h1>
            <p class="mt-1 text-slate-400">Kelola sertifikat yang ditampilkan di tab Certificates.</p>
        </div>
        <a href="{{ route('admin.certificates.create') }}" class="btn-primary rounded-full px-6 py-3 text-sm font-semibold text-white">+ Tambah Sertifikat</a>
    </div>

    <div class="glass glass-card overflow-x-auto rounded-2xl">
        <table class="w-full text-left text-sm">
            <thead>
                <tr class="border-b border-white/8 text-xs uppercase tracking-wider text-slate-500">
                    <th class="px-6 py-4">Sertifikat</th>
                    <th class="px-6 py-4">Kategori</th>
                    <th class="px-6 py-4">Terbit</th>
                    <th class="px-6 py-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/8">
                @forelse ($certificates as $certificate)
                    <tr class="transition hover:bg-white/3">
                        <td class="px-6 py-4">
                            <p class="font-medium text-white">{{ $certificate->title }}</p>
                            <p class="text-xs text-slate-500">{{ $certificate->issuer }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <span class="rounded-full bg-orange-500/15 px-3 py-1 text-xs font-semibold text-orange-300">{{ $certificate->category }}</span>
                        </td>
                        <td class="px-6 py-4 text-slate-300">{{ $certificate->issued_date?->format('d M Y') ?? '—' }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <a href="{{ route('admin.certificates.edit', $certificate) }}" class="text-indigo-300 hover:text-indigo-200">Edit</a>
                                <form action="{{ route('admin.certificates.destroy', $certificate) }}" method="POST" onsubmit="return confirm('Hapus sertifikat ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-rose-400 hover:text-rose-300">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-16 text-center text-slate-500">Belum ada sertifikat. Klik "Tambah Sertifikat" untuk mulai.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection