<form action="{{ $action }}" method="POST" enctype="multipart/form-data" class="glass glass-card max-w-3xl rounded-3xl p-8">
    @csrf
    @method($method)

    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
        <div>
            <label for="title" class="mb-2 block text-sm font-medium text-slate-300">Judul *</label>
            <input id="title" type="text" name="title" value="{{ old('title', $post?->title) }}" required
                   class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-sm text-white transition focus:border-indigo-400/60">
            @error('title') <p class="mt-1 text-xs text-rose-400">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="slug" class="mb-2 block text-sm font-medium text-slate-300">Slug (opsional)</label>
            <input id="slug" type="text" name="slug" value="{{ old('slug', $post?->slug) }}" placeholder="otomatis dari judul"
                   class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-sm text-white transition focus:border-indigo-400/60">
            @error('slug') <p class="mt-1 text-xs text-rose-400">{{ $message }}</p> @enderror
        </div>
    </div>

    <div class="mt-5">
        <label for="excerpt" class="mb-2 block text-sm font-medium text-slate-300">Ringkasan *</label>
        <textarea id="excerpt" name="excerpt" rows="3" required
                  class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-sm text-white transition focus:border-indigo-400/60">{{ old('excerpt', $post?->excerpt) }}</textarea>
        @error('excerpt') <p class="mt-1 text-xs text-rose-400">{{ $message }}</p> @enderror
    </div>

    <div class="mt-5">
        <label for="body" class="mb-2 block text-sm font-medium text-slate-300">Isi Artikel *</label>
        <textarea id="body" name="body" rows="14" required
                  class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-sm text-white transition focus:border-indigo-400/60">{{ old('body', $post?->body) }}</textarea>
        <p class="mt-1.5 text-xs text-slate-500">Tulis paragraf biasa. Gunakan tanda pagar (#, ##) untuk judul.</p>
        @error('body') <p class="mt-1 text-xs text-rose-400">{{ $message }}</p> @enderror
    </div>

    <div class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2">
        <div>
            <label for="image" class="mb-2 block text-sm font-medium text-slate-300">Gambar</label>
            <input id="image" type="file" name="image" accept="image/*"
                   class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-sm text-slate-300 transition focus:border-indigo-400/60 file:mr-3 file:rounded-lg file:border-0 file:bg-indigo-500/20 file:px-4 file:py-2 file:text-xs file:font-semibold file:text-indigo-200">
            @if ($post?->image)
                <p class="mt-2 text-xs text-slate-500">Gambar saat ini: {{ $post->image }}</p>
            @endif
            @error('image') <p class="mt-1 text-xs text-rose-400">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="published_at" class="mb-2 block text-sm font-medium text-slate-300">Tanggal Terbit</label>
            <input id="published_at" type="datetime-local" name="published_at"
                   value="{{ old('published_at', $post?->published_at?->format('Y-m-d\TH:i')) }}"
                   class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-sm text-white transition focus:border-indigo-400/60">
            @error('published_at') <p class="mt-1 text-xs text-rose-400">{{ $message }}</p> @enderror
        </div>
    </div>

    <label class="mt-6 flex items-center gap-3 rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-sm text-slate-300">
        <input type="checkbox" name="is_published" value="1" {{ old('is_published', $post?->is_published) ? 'checked' : '' }} class="h-4 w-4 rounded border-white/20">
        Publikasikan artikel ini
    </label>

    <div class="mt-8 flex items-center gap-3">
        <button type="submit" class="btn-primary rounded-full px-7 py-3 text-sm font-semibold text-white">Simpan Artikel</button>
        <a href="{{ route('admin.posts.index') }}" class="btn-ghost rounded-full px-7 py-3 text-sm font-medium text-white">Batal</a>
    </div>
</form>