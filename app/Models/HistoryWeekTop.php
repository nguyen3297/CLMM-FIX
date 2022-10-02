<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryWeekTop extends Model
{
    use HasFactory;
    protected $fillable = [
        'phone',
        'status',
        'phoneSend',
        'amount',
        'top',
        'gift'
    ];
}
