<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Register extends Model
{
    protected $fillable = [
        'patient_id', 
        'schedule_id', 
        'description', 
        'queue',
    ];

    public static function getTodayQueue() 
    {
        $queue = Register::whereDate('created_at', Carbon::today())
            ->latest('created_at')
            ->first()?->queue;

        return 1 + ($queue ?? 0);
    }
}
