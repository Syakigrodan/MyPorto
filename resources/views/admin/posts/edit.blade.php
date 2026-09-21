@extends('layouts.admin')

@section('title', 'Edit Artikel')

@section('content')
    <div class="mb-8">
        <a href="{{ route('admin.posts.index') }}" class="text-sm text-slate-400 hover:text-white">← Kembali</a>
        <h1 class="mt-2 text-3xl font-extrabold text-white">Edit Artikel</h1>
    </div>

    @include('admin.posts._form', [
        'action' => route('admin.posts.update', $post),
        'method' => 'PUT',
        'post' => $post,
    ])
@endsection