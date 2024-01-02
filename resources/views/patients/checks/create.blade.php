@extends('layouts.app')
<!-- Menggunakan layout app.blade.php -->

@section('content')

<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div>
        <button class="btn btn-success my-2 w-100" onclick="window.location.href = '/register/patients'">Pasien
            baru</button>

        <form class="card" action="{{ route('store-clinics') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="record_number">Nomor Rekam Medis</label>
                    <input type="text" name="record_number"
                        class="form-control @error('record_number') is-invalid @enderror" id="record_number"
                        placeholder="Masukan No RM" value="{{ old('record_number') }}">
                    @error('record_number')
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
                    <label for="schedule">Pilih Jadwal</label>
                    <select name="schedule" id="schedule" class="form-control @error('schedule') is-invalid @enderror">
                        <option value="" selected disabled>Jadwal</option>
                        @foreach ($schedules as $schedule)
                        <option value="{{ $schedule->id }}">
                            {{ $schedule->doctor->name }} - {{ $schedule->days }} - ({{ $schedule->start_hour }} - {{
                            $schedule->end_hour }})
                        </option>
                        @endforeach
                    </select>
                    @error('schedule')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Keluhan</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                        id="description" placeholder="Masukan Keluhan"> {{ old('description') }} </textarea>
                    @error('description')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary my-2 w-100">daftar</button>
            </div>
        </form>
    </div>
</div>


@endsection