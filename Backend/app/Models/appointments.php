<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appointments extends Model
{
    use HasFactory;

    protected $table = 'doctor_patient';

    protected $fillable = [
        'doctor_id',
        'patient_id',
        'date',
        'status',
    ];
}
