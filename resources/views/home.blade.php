@extends('layouts.navbar')
<!-- Menggunakan layout app.blade.php -->

@section('content')

<p>Selamat Datang {{ session('role') }} di Apps rumah sakit</p>

@endsection
