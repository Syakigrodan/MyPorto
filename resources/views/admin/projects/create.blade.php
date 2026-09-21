@extends('layouts.admin')

@section('title', 'Tambah Proyek')

@section('content')
    <div class="mb-8">
        <a href="{{ route('admin.projects.index') }}" class="text-sm text-slate-400 hover:text-white">← Kembali</a>
        <h1 class="mt-2 text-3xl font-extrabold text-white">Tambah Proyek Baru</h1>
    </div>

    @include('admin.projects._form', [
        'action' => route('admin.projects.store'),
        'method' => 'POST',
        'project' => null,
    ])
@endsection