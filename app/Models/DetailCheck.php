<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailCheck extends Model
{
    protected $fillable = [
        'medicine_id', 'check_id',
    ];
}
