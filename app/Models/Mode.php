<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mode extends Model
{
    /** @use HasFactory<\Database\Factories\ModeFactory> */
    use HasFactory;
    
    protected $fillable = [
        'mode_name',
    ];
}
