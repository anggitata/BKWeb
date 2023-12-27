<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    protected $fillable = [
        'register_id', 'date', 'notes', 'price',
    ];}