@extends('layouts.app')

@section('title', 'Blog')
@section('meta_description', 'Artikel dan catatan ' . config('portfolio.name') . ' seputar teknologi dan pengembangan web')

@section('content')
    <section class="bg-grid relative overflow-hidden">
        <div class="blob left-[-10%] top-[-10%] h-96 w-96 bg-violet-600/25"></div>
        <div class="blob right-[-10%] bottom-[-20%] h-96 w-96 bg-indigo-600/25"></div>

        <div class="mx-auto max-w-6xl px-5 py-16">
            <div class="mb-12 max-w-2xl reveal">
                <p class="text-sm font-semibold uppercase tracking-widest text-indigo-400">Blog</p>
                <h1 class="mt-2 text-4xl font-extrabold text-white sm:text-5xl">
                    Artikel & <span class="text-gradient">Catatan</span>
                </h1>
                <p class="mt-4 text-slate-400">Berbagi ilmu dan pengalaman seputar pengembangan web, teknologi, dan produktivitas.</p>
            </div>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                @forelse ($posts as $index => $post)
                    <a href="{{ route('blog.show', $post) }}" class="glass glass-card card-hover reveal rounded-2xl p-6" style="transition-delay:{{ ($index % 3) * 70 }}ms">
                        <div class="flex h-36 items-center justify-center rounded-xl bg-gradient-to-br from-indigo-600/20 via-cyan-500/15 to-violet-600/20 text-5xl">
                            {{ ['💡', '🚀', '⚙️', '🎨', '📈', '🧠'][$index % 6] }}
                        </div>
                        <div class="mt-5 flex items-center gap-3 text-xs text-slate-500">
                            <span class="rounded-full bg-white/5 px-3 py-1">{{ $post->published_at->format('d M Y') }}</span>
                            <span>📖 3 menit baca</span>
                        </div>
                        <h2 class="mt-3 line-clamp-2 text-lg font-bold leading-snug text-white">{{ $post->title }}</h2>
                        <p class="mt-2 line-clamp-3 text-sm leading-relaxed text-slate-400">{{ $post->excerpt }}</p>
                        <p class="mt-4 text-sm font-semibold text-indigo-300">Baca Selengkapnya →</p>
                    </a>
                @empty
                    <div class="col-span-full py-20 text-center text-slate-400">
                        Belum ada artikel. Silakan tulis melalui panel admin.
                    </div>
                @endforelse
            </div>

            <div class="mt-12">
                {{ $posts->links() }}
            </div>
        </div>
    </section>
@endsection