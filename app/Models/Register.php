<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $fillable = [
        'patient_id', 'schedule_id', 'description', 'queue',
    ];
}
