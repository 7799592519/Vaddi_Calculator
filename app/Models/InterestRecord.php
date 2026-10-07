<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InterestRecord extends Model
{
    use HasFactory;
    protected $fillable = [
        'person_name',
        'principal_amount',
        'interest_rate',
        'interest_type',
        'start_date',
        'end_date',
        'total_interest',
        'final_amount',
        'status',
    ];
}
