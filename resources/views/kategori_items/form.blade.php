@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>{{ $method == 'new' ? 'Tambah' : 'Edit' }} Kategori Item</h3>
        <form method="POST"
            action="{{ $method == 'new' ? route('kategori-items.store') : route('kategori-items.update', $kategori->id) }}">
            @csrf
            @if ($method == 'edit')
                @method('PUT')
            @endif
            <div class="mb-3">
                <label>Kode</label>
                <input type="text" name="kode" class="form-control" value="{{ old('kode', $kategori->kode) }}" required>
            </div>
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama', $kategori->nama) }}"
                    required>
            </div>
            <button class="btn btn-primary">Simpan</button>
            <a href="{{ route('kategori-items.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
