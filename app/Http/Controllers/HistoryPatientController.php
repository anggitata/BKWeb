<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoryPatientController extends Controller
{
    public function index()
    {
        return view('history-patient');
    }
}
