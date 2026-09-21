@extends('layouts.admin')

@section('title', 'Edit Proyek')

@section('content')
    <div class="mb-8">
        <a href="{{ route('admin.projects.index') }}" class="text-sm text-slate-400 hover:text-white">← Kembali</a>
        <h1 class="mt-2 text-3xl font-extrabold text-white">Edit Proyek</h1>
    </div>

    @include('admin.projects._form', [
        'action' => route('admin.projects.update', $project),
        'method' => 'PUT',
        'project' => $project,
    ])
@endsection