<?php

namespace App\Http\Controllers\Patients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Patient;
use App\Models\Register;
use App\Models\Schedule;

use Closure;

class ChecksController extends Controller
{
    public function create()
    {
        $schedules = Schedule::all();

        return view('patients.checks.create', [
            'schedules' => $schedules
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'address'       => 'required|string|max:255',
            'schedule'      => 'required',
            'description'   => 'required|string|max:255',
            'record_number' => [ 
                'required', 
                'max:255',
                function (string $attribute, mixed $value, Closure $fail) 
                {
                    $value = Patient::where('record_number', $value)->first();

                    if (is_null($value)) {
                        $fail("Invalid RM Number");
                    }
                }  
            ],
        ]);

        $patientId = Patient::where('record_number', $request->record_number)->first()->id; 
        $register  = Register::create([
            'patient_id'  => $patientId,
            'address'     => $request->address,
            'schedule_id' => $request->schedule,
            'description' => $request->description,
            'queue'       => Register::getTodayQueue()
        ]);

        return $register;
    }
}
