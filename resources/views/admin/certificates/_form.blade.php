<form action="{{ $action }}" method="POST" class="glass glass-card max-w-3xl rounded-3xl p-8">
    @csrf
    @method($method)

    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
        <div>
            <label for="title" class="mb-2 block text-sm font-medium text-slate-300">Judul Sertifikat *</label>
            <input id="title" type="text" name="title" value="{{ old('title', $certificate?->title) }}" required
                   class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-sm text-white transition focus:border-indigo-400/60">
            @error('title') <p class="mt-1 text-xs text-rose-400">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="issuer" class="mb-2 block text-sm font-medium text-slate-300">Penerbit *</label>
            <input id="issuer" type="text" name="issuer" value="{{ old('issuer', $certificate?->issuer) }}" required
                   class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-sm text-white transition focus:border-indigo-400/60">
            @error('issuer') <p class="mt-1 text-xs text-rose-400">{{ $message }}</p> @enderror
        </div>
    </div>

    <div class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
        <div>
            <label for="category" class="mb-2 block text-sm font-medium text-slate-300">Kategori *</label>
            <select id="category" name="category" required
                    class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-sm text-white transition focus:border-indigo-400/60">
                @foreach ($categories as $category)
                    <option value="{{ $category }}" @selected(old('category', $certificate?->category) === $category)>{{ $category }}</option>
                @endforeach
            </select>
            @error('category') <p class="mt-1 text-xs text-rose-400">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="issued_date" class="mb-2 block text-sm font-medium text-slate-300">Tanggal Terbit</label>
            <input id="issued_date" type="date" name="issued_date"
                   value="{{ old('issued_date', $certificate?->issued_date?->format('Y-m-d')) }}"
                   class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-sm text-white transition focus:border-indigo-400/60">
            @error('issued_date') <p class="mt-1 text-xs text-rose-400">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="sort_order" class="mb-2 block text-sm font-medium text-slate-300">Urutan</label>
            <input id="sort_order" type="number" name="sort_order" value="{{ old('sort_order', $certificate?->sort_order ?? 0) }}"
                   class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-sm text-white transition focus:border-indigo-400/60">
            @error('sort_order') <p class="mt-1 text-xs text-rose-400">{{ $message }}</p> @enderror
        </div>
    </div>

    <div class="mt-5">
        <label for="credential_url" class="mb-2 block text-sm font-medium text-slate-300">Link Kredensial</label>
        <input id="credential_url" type="url" name="credential_url" value="{{ old('credential_url', $certificate?->credential_url) }}"
               placeholder="https://www.credly.com/..."
               class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-sm text-white transition focus:border-indigo-400/60">
        @error('credential_url') <p class="mt-1 text-xs text-rose-400">{{ $message }}</p> @enderror
    </div>

    <div class="mt-5">
        <label for="description" class="mb-2 block text-sm font-medium text-slate-300">Deskripsi</label>
        <textarea id="description" name="description" rows="3"
                  class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-sm text-white transition focus:border-indigo-400/60">{{ old('description', $certificate?->description) }}</textarea>
        @error('description') <p class="mt-1 text-xs text-rose-400">{{ $message }}</p> @enderror
    </div>

    <div class="mt-8 flex items-center gap-3">
        <button type="submit" class="btn-primary rounded-full px-7 py-3 text-sm font-semibold text-white">Simpan Sertifikat</button>
        <a href="{{ route('admin.certificates.index') }}" class="btn-ghost rounded-full px-7 py-3 text-sm font-medium text-white">Batal</a>
    </div>
</form>