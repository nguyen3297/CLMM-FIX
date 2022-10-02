<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Muster extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone', 'amount', 'status', 'turn', 'pay'
    ];
}
