@extends('layouts.admin')

@section('title', 'Edit Sertifikat')

@section('content')
    <div class="mb-8">
        <a href="{{ route('admin.certificates.index') }}" class="text-sm text-slate-400 hover:text-white">← Kembali</a>
        <h1 class="mt-2 text-3xl font-extrabold text-white">Edit Sertifikat</h1>
    </div>

    @include('admin.certificates._form', [
        'action' => route('admin.certificates.update', $certificate),
        'method' => 'PUT',
        'certificate' => $certificate,
        'categories' => \App\Models\Certificate::CATEGORIES,
    ])
@endsection