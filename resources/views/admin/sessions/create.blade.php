@extends('layouts.app')
<!-- Menggunakan layout app.blade.php -->

@section('content')

<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <form class="card" action="{{ route('create-session') }}" method="POST">
        @csrf
        <div class="card-body">
            @if(session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
            @endif
            <div class="form-group">

                <label for="credential">Nama</label>
                <input type="text" name="credential" class="form-control" id="credential"
                    placeholder="Masukan Username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">

                <div class="form-group" style="visibility: hidden;">
                    <label for="role">role</label>
                    <input type="text" name="role" class="form-control" id="role" value="admin">
                </div>
                <button type="submit" class="btn btn-primary my-2 w-100">Login</button>
            </div>
    </form>
</div>


@endsection