<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeLimit extends Model
{
    /** @use HasFactory<\Database\Factories\TimeLimitFactory> */
    use HasFactory;
    
    protected $fillable = [
        'in',
        'out',
    ];
}
