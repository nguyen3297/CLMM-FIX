<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryBank extends Model
{
    use HasFactory;
    protected $fillable = [
        'phone',
        'details',
        'status',
    ];
}
