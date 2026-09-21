<form action="{{ $action }}" method="POST" enctype="multipart/form-data" class="glass glass-card max-w-3xl rounded-3xl p-8">
    @csrf
    @method($method)

    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
        <div>
            <label for="title" class="mb-2 block text-sm font-medium text-slate-300">Judul *</label>
            <input id="title" type="text" name="title" value="{{ old('title', $project?->title) }}" required
                   class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-sm text-white transition focus:border-indigo-400/60">
            @error('title') <p class="mt-1 text-xs text-rose-400">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="slug" class="mb-2 block text-sm font-medium text-slate-300">Slug (opsional)</label>
            <input id="slug" type="text" name="slug" value="{{ old('slug', $project?->slug) }}" placeholder="otomatis dari judul"
                   class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-sm text-white transition focus:border-indigo-400/60">
            @error('slug') <p class="mt-1 text-xs text-rose-400">{{ $message }}</p> @enderror
        </div>
    </div>

    <div class="mt-5">
        <label for="description" class="mb-2 block text-sm font-medium text-slate-300">Deskripsi *</label>
        <textarea id="description" name="description" rows="4" required
                  class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-sm text-white transition focus:border-indigo-400/60">{{ old('description', $project?->description) }}</textarea>
        @error('description') <p class="mt-1 text-xs text-rose-400">{{ $message }}</p> @enderror
    </div>

    <div class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2">
        <div>
            <label for="tech_stack" class="mb-2 block text-sm font-medium text-slate-300">Teknologi</label>
            <input id="tech_stack" type="text" name="tech_stack"
                   value="{{ old('tech_stack', $project ? implode(', ', $project->tech_stack ?? []) : null) }}"
                   placeholder="Laravel, MySQL, Tailwind CSS"
                   class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-sm text-white transition focus:border-indigo-400/60">
            <p class="mt-1.5 text-xs text-slate-500">Pisahkan dengan koma.</p>
            @error('tech_stack') <p class="mt-1 text-xs text-rose-400">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="sort_order" class="mb-2 block text-sm font-medium text-slate-300">Urutan</label>
            <input id="sort_order" type="number" name="sort_order" value="{{ old('sort_order', $project?->sort_order ?? 0) }}"
                   class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-sm text-white transition focus:border-indigo-400/60">
            @error('sort_order') <p class="mt-1 text-xs text-rose-400">{{ $message }}</p> @enderror
        </div>
    </div>

    <div class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2">
        <div>
            <label for="link" class="mb-2 block text-sm font-medium text-slate-300">Link Live</label>
            <input id="link" type="url" name="link" value="{{ old('link', $project?->link) }}" placeholder="https://..."
                   class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-sm text-white transition focus:border-indigo-400/60">
            @error('link') <p class="mt-1 text-xs text-rose-400">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="github" class="mb-2 block text-sm font-medium text-slate-300">Link GitHub</label>
            <input id="github" type="url" name="github" value="{{ old('github', $project?->github) }}" placeholder="https://github.com/..."
                   class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-sm text-white transition focus:border-indigo-400/60">
            @error('github') <p class="mt-1 text-xs text-rose-400">{{ $message }}</p> @enderror
        </div>
    </div>

    <div class="mt-5">
        <label for="image" class="mb-2 block text-sm font-medium text-slate-300">Gambar</label>
        <input id="image" type="file" name="image" accept="image/*"
               class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-sm text-slate-300 transition focus:border-indigo-400/60 file:mr-3 file:rounded-lg file:border-0 file:bg-indigo-500/20 file:px-4 file:py-2 file:text-xs file:font-semibold file:text-indigo-200">
        @if ($project?->image)
            <p class="mt-2 text-xs text-slate-500">Gambar saat ini: {{ $project->image }}</p>
        @endif
        @error('image') <p class="mt-1 text-xs text-rose-400">{{ $message }}</p> @enderror
    </div>

    <div class="mt-6 flex flex-wrap gap-4">
        <label class="flex flex-1 items-center gap-3 rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-sm text-slate-300">
            <input type="checkbox" name="featured" value="1" {{ old('featured', $project?->featured) ? 'checked' : '' }} class="h-4 w-4 rounded border-white/20">
            Tandai sebagai proyek unggulan
        </label>
    </div>

    <div class="mt-8 flex items-center gap-3">
        <button type="submit" class="btn-primary rounded-full px-7 py-3 text-sm font-semibold text-white">Simpan Proyek</button>
        <a href="{{ route('admin.projects.index') }}" class="btn-ghost rounded-full px-7 py-3 text-sm font-medium text-white">Batal</a>
    </div>
</form>