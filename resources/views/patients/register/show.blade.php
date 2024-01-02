@extends('layouts.app')
<!-- Menggunakan layout app.blade.php -->

@section('content')

<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card">
    {{ $patient->record_number }}
    </div>
</div>


@endsection
