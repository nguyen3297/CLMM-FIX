<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryDayMission extends Model
{
    use HasFactory;
    protected $fillable = [
        'phone',
        'amount',
        'level',
        'receive',
        'status',
        'pay'
    ];
}
