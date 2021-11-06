<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'purpose',
        'status',
        'comment',
        'isRemove',
        'date',
        'time',
        'type_of_appointment'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
