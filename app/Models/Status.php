<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Status extends Model
{
    /** @use HasFactory<\Database\Factories\StatusFactory> */
    use HasFactory;

    protected $fillable = [
        'status_name',
    ];

    public function attendance() :HasMany
    {
        return $this->hasMany(Attendance::class);
    }

    public function permission() :HasMany
    {
        return $this->hasMany(Permission::class);
    }
}
