@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Kategori Items</h3>
        <a href="{{ route('kategori-items.create') }}" class="btn btn-primary mb-2">Tambah Kategori</a>
        <form method="GET" class="mb-3">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="kode" class="form-control" placeholder="Kode" value="{{ request('kode') }}">
                </div>
                <div class="col-md-4">
                    <input type="text" name="nama" class="form-control" placeholder="Nama"
                        value="{{ request('nama') }}">
                </div>
                <div class="col-md-4">
                    <button class="btn btn-secondary">Filter</button>
                </div>
            </div>
        </form>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategoris as $kategori)
                    <tr>
                        <td>{{ $kategori->kode }}</td>
                        <td>{{ $kategori->nama }}</td>
                        <td>
                            <a href="{{ route('kategori-items.show', $kategori->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('kategori-items.edit', $kategori->id) }}"
                                class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('kategori-items.destroy', $kategori->id) }}" method="POST"
                                style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin hapus?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $kategoris->links() }}
    </div>
@endsection
