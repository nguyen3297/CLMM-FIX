<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryHu extends Model
{
    use HasFactory;
    protected $fillable = [
        'phone', 'amount', 'tranId', 'status'
    ];
}
