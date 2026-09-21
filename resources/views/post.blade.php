@extends('layouts.app')

@section('title', $post->title)
@section('meta_description', $post->excerpt)

@section('content')
    <section class="bg-grid relative overflow-hidden">
        <div class="blob left-[-10%] top-[-10%] h-96 w-96 bg-indigo-600/25"></div>
        <div class="blob right-[-10%] bottom-[-20%] h-96 w-96 bg-cyan-500/20"></div>

        <div class="mx-auto max-w-3xl px-5 py-16">
            <a href="{{ route('blog.index') }}" class="text-sm text-slate-400 transition hover:text-white">← Kembali ke Blog</a>

            <div class="mt-6 reveal">
                <div class="flex items-center gap-3 text-xs text-slate-500">
                    <span class="rounded-full bg-white/5 px-3 py-1">{{ $post->published_at->format('d M Y') }}</span>
                    <span>{{ $post->published_at->format('H:i') }}</span>
                </div>
                <h1 class="mt-4 text-3xl font-extrabold leading-tight text-white sm:text-4xl">{{ $post->title }}</h1>

                <div class="mt-8 flex h-52 items-center justify-center rounded-2xl bg-gradient-to-br from-indigo-600/25 via-cyan-500/15 to-violet-600/25 text-7xl">
                    {{ ['💡', '🚀', '⚙️', '🎨'][abs(crc32($post->slug)) % 4] }}
                </div>

                <div class="prose-article mt-8 rounded-2xl p-6 glass sm:p-8">
                    {!! nl2br(e($post->body)) !!}
                </div>
            </div>
        </div>
    </section>

    @if ($related->isNotEmpty())
        <section class="mx-auto max-w-6xl px-5 py-16">
            <h2 class="mb-8 text-2xl font-extrabold text-white reveal">Artikel Lainnya</h2>
            <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                @foreach ($related as $index => $relatedPost)
                    <a href="{{ route('blog.show', $relatedPost) }}" class="glass glass-card card-hover reveal rounded-2xl p-6" style="transition-delay:{{ $index * 70 }}ms">
                        <p class="text-xs text-slate-500">{{ $relatedPost->published_at->format('d M Y') }}</p>
                        <h3 class="mt-2 line-clamp-2 text-lg font-bold leading-snug text-white">{{ $relatedPost->title }}</h3>
                        <p class="mt-2 text-sm font-semibold text-indigo-300">Baca →</p>
                    </a>
                @endforeach
            </div>
        </section>
    @endif
@endsection