<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Login Admin — MyPortofolio</title>
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700,800" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-grid flex min-h-screen items-center justify-center px-5 antialiased">
        <div class="blob left-[-10%] top-[-10%] h-96 w-96 bg-indigo-600/35"></div>
        <div class="blob bottom-[-20%] right-[-10%] h-96 w-96 bg-cyan-500/25"></div>

        <div class="glass glass-card relative w-full max-w-md rounded-3xl p-8 sm:p-10">
            <div class="mb-8 text-center">
                <span class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-indigo-500 to-cyan-400 text-xl font-black text-white shadow-lg shadow-indigo-500/40">
                    {{ strtoupper(substr(config('portfolio.name'), 0, 1)) }}
                </span>
                <h1 class="mt-5 text-2xl font-extrabold text-white">Selamat Datang</h1>
                <p class="mt-1 text-sm text-slate-400">Masuk ke panel admin MyPortofolio</p>
            </div>

            @if ($errors->any())
                <div class="mb-5 rounded-xl border border-rose-400/30 bg-rose-500/10 px-4 py-3 text-sm text-rose-300">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('admin.login') }}" method="POST">
                @csrf
                <div>
                    <label for="email" class="mb-2 block text-sm font-medium text-slate-300">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                           class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-sm text-white placeholder-slate-500 transition focus:border-indigo-400/60 focus:bg-white/8">
                </div>

                <div class="mt-5">
                    <label for="password" class="mb-2 block text-sm font-medium text-slate-300">Password</label>
                    <input id="password" type="password" name="password" required
                           class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-sm text-white placeholder-slate-500 transition focus:border-indigo-400/60 focus:bg-white/8">
                </div>

                <div class="mt-4 flex items-center justify-between">
                    <label class="flex items-center gap-2 text-sm text-slate-400">
                        <input type="checkbox" name="remember" class="rounded border-white/20 bg-white/5">
                        Ingat saya
                    </label>
                    <a href="{{ route('home') }}" class="text-sm text-indigo-300 hover:text-indigo-200">← Kembali</a>
                </div>

                <button type="submit" class="btn-primary mt-6 w-full rounded-full py-3.5 text-sm font-semibold text-white">
                    Masuk →
                </button>
            </form>
        </div>
    </body>
</html>