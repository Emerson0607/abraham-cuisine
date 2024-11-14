<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    
    protected $casts = [
        'schedule' => 'datetime',
    ];

    protected $fillable = [
        'fullname',
        'contact',
        'email',
        'address',
        'table',
        'schedule',
        'status',
    ];

}
