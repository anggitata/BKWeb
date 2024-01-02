@extends('layouts.app')
<!-- Menggunakan layout app.blade.php -->

@section('content')

<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div>
        <button class="btn btn-success my-2 w-100" onclick="window.location.href = '/register/clinics'">Pasien
            Lama</button>

        <form class="card" action="{{ route('store-patient') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                        placeholder="Masukan Nama" value="{{ old('name') }}">
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="address">Alamat</label>
                    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                        id="address" placeholder="Masukan Alamat" value="{{ old('address') }}">
                    @error('address')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="ktp">No KTP</label>
                    <input type="number" name="ktp" class="form-control @error('ktp') is-invalid @enderror" id="ktp"
                        placeholder="Masukan No KTP" value="{{ old('ktp') }}">
                    @error('ktp')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone">No HP</label>
                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone"
                        placeholder="Masukan No HP" value="{{ old('phone') }}">
                    @error('phone')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary my-2 w-100">daftar</button>
            </div>
        </form>
    </div>
</div>


@endsection