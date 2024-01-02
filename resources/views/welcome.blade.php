<!-- resources/views/home.blade.php -->
@extends('layouts.app')
<!-- Menggunakan layout app.blade.php -->

@section('content')
<div class="container d-flex h-100 items-center justify-content-center gap-4" style="height: 100vh !important;">

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Login Sebagai Dokter</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
            <a href="{{ route('doctor-login') }}" class="btn btn-primary">Masuk</a>
        </div>
    </div>

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Daftar Poli</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="/register/patients" class="btn btn-primary">Masuk</a>
        </div>
    </div>

</div>


@endsection
