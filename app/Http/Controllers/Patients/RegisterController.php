<?php

namespace App\Http\Controllers\Patients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Patient;

class RegisterController extends Controller
{
    public function create()
    {
        return view('patients.register.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:50',
            'address' => 'required|string|max:255',
            'ktp'     => 'required|numeric|digits:16|unique:patients',
            'phone'   => 'required|numeric|digits_between:11,15|unique:patients'
        ]);

        $nextId = Patient::getNextId();

        $patient = Patient::create([
            'name'          => $request->name,
            'address'       => $request->address,
            'ktp'           => $request->ktp,
            'phone'         => $request->phone,
            'record_number' => "RM-" . $nextId
        ]);

        return view('patients.register.show', [
            'patient' => $patient
        ]);
    }

    public function show()
    {
        return view('patients.register.show');
    }
}
