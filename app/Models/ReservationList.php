<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReservationList extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_updated',
        'code',
        'schedule',
        'client',
        'status',
        'action',
    ];

    // Explicitly define the table name if it differs from the default
    protected $table = 'reservation_list'; // If the table name is singular
}
