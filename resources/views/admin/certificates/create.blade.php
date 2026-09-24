@extends('layouts.admin')

@section('title', 'Tambah Sertifikat')

@section('content')
    <div class="mb-8">
        <a href="{{ route('admin.certificates.index') }}" class="text-sm text-slate-400 hover:text-white">← Kembali</a>
        <h1 class="mt-2 text-3xl font-extrabold text-white">Tambah Sertifikat Baru</h1>
    </div>

    @include('admin.certificates._form', [
        'action' => route('admin.certificates.store'),
        'method' => 'POST',
        'certificate' => null,
        'categories' => \App\Models\Certificate::CATEGORIES,
    ])
@endsection