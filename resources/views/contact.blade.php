@extends('layouts.app')

@section('title', 'Kontak')
@section('meta_description', 'Hubungi ' . config('portfolio.name') . ' untuk kolaborasi atau proyek')

@section('content')
    <section class="bg-grid relative overflow-hidden">
        <div class="blob left-[-10%] top-[-10%] h-96 w-96 bg-indigo-600/30"></div>
        <div class="blob right-[-10%] bottom-[-20%] h-96 w-96 bg-violet-600/30"></div>

        <div class="mx-auto max-w-6xl px-5 py-16">
            <div class="mb-14 max-w-2xl reveal">
                <p class="text-sm font-semibold uppercase tracking-widest text-indigo-400">Kontak</p>
                <h1 class="mt-2 text-4xl font-extrabold text-white sm:text-5xl">
                    Mari <span class="text-gradient">Berkolaborasi</span>
                </h1>
                <p class="mt-4 text-slate-400">Punya pertanyaan atau proyek yang ingin dikerjakan? Jangan ragu untuk menghubungi saya.</p>
            </div>

            @if (session('success'))
                <div class="mb-6 flex items-center gap-3 rounded-xl border border-emerald-400/30 bg-emerald-500/10 px-5 py-4 text-sm text-emerald-300 reveal is-visible">
                    ✅ {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 gap-8 lg:grid-cols-5">
                <div class="space-y-5 lg:col-span-2">
                    <div class="glass glass-card card-hover reveal rounded-2xl p-6">
                        <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-indigo-500/15 text-2xl">📧</span>
                        <h3 class="mt-4 font-semibold text-white">Email</h3>
                        <p class="mt-1 text-sm text-slate-400">{{ config('portfolio.email') }}</p>
                    </div>
                    <div class="glass glass-card card-hover reveal rounded-2xl p-6" style="transition-delay:70ms">
                        <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-cyan-500/15 text-2xl">📱</span>
                        <h3 class="mt-4 font-semibold text-white">Telepon</h3>
                        <p class="mt-1 text-sm text-slate-400">{{ config('portfolio.phone') }}</p>
                    </div>
                    <div class="glass glass-card card-hover reveal rounded-2xl p-6" style="transition-delay:140ms">
                        <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-violet-500/15 text-2xl">📍</span>
                        <h3 class="mt-4 font-semibold text-white">Lokasi</h3>
                        <p class="mt-1 text-sm text-slate-400">{{ config('portfolio.location') }}</p>
                    </div>
                </div>

                <form action="{{ route('contact.send') }}" method="POST" class="glass glass-card reveal rounded-3xl p-8 lg:col-span-3" style="transition-delay:100ms">
                    @csrf

                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                        <div>
                            <label for="name" class="mb-2 block text-sm font-medium text-slate-300">Nama</label>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" required
                                   class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-sm text-white placeholder-slate-500 transition focus:border-indigo-400/60 focus:bg-white/8">
                            @error('name') <p class="mt-1 text-xs text-rose-400">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="email" class="mb-2 block text-sm font-medium text-slate-300">Email</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                   class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-sm text-white placeholder-slate-500 transition focus:border-indigo-400/60 focus:bg-white/8">
                            @error('email') <p class="mt-1 text-xs text-rose-400">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="mt-5">
                        <label for="subject" class="mb-2 block text-sm font-medium text-slate-300">Subjek</label>
                        <input id="subject" type="text" name="subject" value="{{ old('subject') }}" required
                               class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-sm text-white placeholder-slate-500 transition focus:border-indigo-400/60 focus:bg-white/8">
                        @error('subject') <p class="mt-1 text-xs text-rose-400">{{ $message }}</p> @enderror
                    </div>

                    <div class="mt-5">
                        <label for="message" class="mb-2 block text-sm font-medium text-slate-300">Pesan</label>
                        <textarea id="message" name="message" rows="6" required
                                  class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-sm text-white placeholder-slate-500 transition focus:border-indigo-400/60 focus:bg-white/8">{{ old('message') }}</textarea>
                        @error('message') <p class="mt-1 text-xs text-rose-400">{{ $message }}</p> @enderror
                    </div>

                    <button type="submit" class="btn-primary mt-6 rounded-full px-8 py-3.5 text-sm font-semibold text-white">
                        Kirim Pesan →
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection