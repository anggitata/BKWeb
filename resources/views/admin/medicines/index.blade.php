@extends('layouts.navbar')
<!-- Menggunakan layout app.blade.php -->

@section('content')

<a href="{{ route('create-medicines') }}" class="btn btn-primary mt-5">Tambah Obat</a>
<div class="card mt-2">
    <div class="card-body">
        @if(session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
        @endif
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kemasan</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($medicines as $medicine)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $medicine->name }}</td>
                    <td>{{ $medicine->packaging }}</td>
                    <td>Rp {{ $medicine->price }}</td>
                    <td>
                        <a href="{{ route('edit-medicines', $medicine->id) }}" class="btn btn-warning">Edit</a>
                        <form class="d-inline" onsubmit="return confirm('Yakin menghapus data ini ?')"
                            action="{{ route('delete-medicines', $medicine->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if ($medicines->isEmpty())
        <p class="text-center"> Data masih kosong </p>
        @endif
    </div>
</div>

@endsection