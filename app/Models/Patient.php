<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    protected $fillable = [
        'name', 
        'address', 
        'phone', 
        'record_number', 
        'ktp',
    ];

    public static function getNextId() 
    {
        $nextId = DB::table('patients')->latest('created_at')->first();

        return 1 + ($nextId->id ?? 0);
    }
}
