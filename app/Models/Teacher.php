<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'contact_number',
        'gender',
        'profession',
        'user_id',


    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
