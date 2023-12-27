@extends('layouts.navbar')
<!-- Menggunakan layout app.blade.php -->

@section('content')

<div class="card mt-2">
    <div class="card-body">
        <form action="{{ route('store-medicines') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                    placeholder="Masukan Nama Obat" value="{{ old('name') }}">
                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="packaging">Kemasan</label>
                <input type="text" class="form-control @error('packaging') is-invalid @enderror" id="packaging"
                    placeholder="Masukan Jenis Kemasan" value="{{ old('packaging') }}" name="packaging">
                @error('packaging')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">Harga</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                    placeholder="Masukan Harga Obat" value="{{ old('price') }}" name="price">
                @error('price')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>
</div>

@endsection