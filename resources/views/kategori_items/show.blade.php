@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Detail Kategori</h3>
        <table class="table">
            <tr>
                <th>Kode</th>
                <td>{{ $kategori->kode }}</td>
            </tr>
            <tr>
                <th>Nama</th>
                <td>{{ $kategori->nama }}</td>
            </tr>
        </table>
        <h5>Daftar Master Item dengan Kategori ini:</h5>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kode Item</th>
                    <th>Nama Item</th>
                    <th>Supplier</th>
                    <th>Jenis</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategori->masterItems as $item)
                    <tr>
                        <td>{{ $item->kode }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->supplier }}</td>
                        <td>{{ $item->jenis }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('kategori-items.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
@endsection
